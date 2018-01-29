<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class AggregateLeadsStatisticsShell extends \Cake\Console\Shell
{
	use \App\Shell\AggregateStatisticsHelper;

    public function initialize()
    {
        parent::initialize();

        $this->Options = TableRegistry::get('Options');

        $this->Keywords = TableRegistry::get('Keywords');
		$this->KeywordStatisticsDaily = TableRegistry::get('KeywordStatisticsDaily');

		$this->Campaigns = TableRegistry::get('Campaigns');
		$this->CampaignStatisticsDaily = TableRegistry::get('CampaignStatisticsDaily');

        $this->AdGroups = TableRegistry::get('AdGroups');
        $this->AdGroupStatisticsDaily = TableRegistry::get('AdGroupStatisticsDaily');

        $this->SiteCalls = TableRegistry::get('SiteCalls');
        $this->SiteEmails = TableRegistry::get('SiteEmails');
    }

    private function forDate($date)
    {
        $from = $date . ' 00:00:00';
        $to = $date . ' 23:59:59';

		$src = [
			[
				'table' => $this->AdGroups,
				'statistics' => $this->AdGroupStatisticsDaily,
				'key' => 'ad_group_id',
			],
			[
				'table' => $this->Campaigns,
				'statistics' => $this->CampaignStatisticsDaily,
				'key' => 'campaign_id',
			],
			[
				'table' => $this->Keywords,
				'statistics' => $this->KeywordStatisticsDaily,
				'key' => 'keyword_id',
			],
			[
				'table' => $this->Sites,
				'statistics' => $this->SiteStatisticsDaily,
				'key' => 'site_id',
			],
			[
				'table' => $this->Projects,
				'statistics' => $this->ProjectStatisticsDaily,
				'key' => 'project_id',
			],
		];

		foreach($src as $table) {
			$items = $table['table']->find('all')->all();
	        foreach ($items as $item) {

				$recordWhere = ['date' => $date];
				$recordWhere[$table['key']] = $item->id;

				$record = $table['statistics']->find('all')->where($recordWhere)->first();

	            if (empty($record)) {
	                $record = $table['statistics']->newEntity();
	                $record->{$table['key']} = $item->id;
	                $record->date = $date;
	            }

	            $conditions = [
	                'time >=' => $from,
	                'time <=' => $to,
	            ];
				$conditions[$table['key']] = $item->id;

	            $record->calls = $this->SiteCalls->findCountBy($conditions);
	            $record->emails = $this->SiteEmails->findCountBy($conditions);

				$record->leads = $record->emails + $record->calls;

	            $table['statistics']->saveStatistics($record);
	        }
		}

    }
}
