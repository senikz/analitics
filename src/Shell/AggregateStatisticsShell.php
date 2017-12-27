<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class AggregateStatisticsShell extends \Cake\Console\Shell
{
    public function initialize()
    {
        parent::initialize();

        $this->Options = TableRegistry::get('Options');
        $this->Campaigns = TableRegistry::get('Campaigns');
        $this->Keywords = TableRegistry::get('Keywords');


        $this->AdGroups = TableRegistry::get('AdGroups');
        $this->AdGroupStatisticsDaily = TableRegistry::get('AdGroupStatisticsDaily');

		$this->SiteCalls = TableRegistry::get('SiteCalls');
		$this->SiteEmails = TableRegistry::get('SiteEmails');
    }

    public function yesterday()
    {
		$calls = $this->SiteCalls->find('all')->all();

		foreach($calls as $call) {

			if($details = $call->getContentDetails()) {
				if(!empty($details['phrase_id'])) {
					$keyword = $this->Keywords->fing('all')->where(['rel_id' => $details['phrase_id']])->first()
					if(!empty($keyword)) {
						$call->keyword_id = $keyword->id;
						$call->ad_group_id = $keyword->ad_group_id;
					}
				}
				$this->SiteCalls->save($call);
			}

		}

		return;
		$this->forDate(date('Y-m-d'));
    }

    public function today()
    {
		$this->forDate(date('Y-m-d', strtotime('-1 day')));
    }

	private function forDate($date)
	{
		$from = $date . ' 00:00:00';
		$to = $date . ' 23:59:59';

		$adGroups = $this->AdGroups->find('all')
			->where(['id' => 2780])
		->all();
		foreach($adGroups as $adGroup) {

			$record = $this->AdGroupStatisticsDaily->find('all')
				->where([
					'ad_group_id' => $adGroup->id,
					'date' => $date,
				])
				->first();

			if(empty($record)) {
				$record = $this->AdGroupStatisticsDaily->newEntity();
				$record->ad_group_id = $adGroup->id;
				$record->date = $date;
			}

			$campaign = $this->Campaigns->find('all')->where(['Campaigns.id' => $adGroup->campaign_id])->contain(false)->first();
			$keywords = $this->Keywords->find('all')->select(['rel_id', 'keyword'])->where(['campaign_id' => $adGroup->campaign_id,])->toArray();

			if(empty($campaign) || empty($keywords)) {
				continue;
			}

			$record->calls = $this->SiteCalls->findCountBy([
				'utm_campaign LIKE' => '%' . $campaign->rel_id . '%',
				'utm_term IN' => array_map(function($item) {
					return $item->keyword;
				}, $keywords),
				'time >=' => $from,
				'time <=' => $to,
			]);
			$record->emails = $this->SiteCalls->findCountBy([
				'utm_campaign LIKE' => '%' . $campaign->rel_id . '%',
				'utm_term REGEXP' => join('|', array_map(function($item) {
					return $item->rel_id;
				}, $keywords)),
				'time >=' => $from,
				'time <=' => $to,
			]);

			$this->AdGroupStatisticsDaily->saveStatistics($record);
		}
	}

}
