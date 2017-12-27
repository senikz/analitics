<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class AggregateLeadsStatisticsShell extends \Cake\Console\Shell
{
    public function initialize()
    {
        parent::initialize();

        $this->Options = TableRegistry::get('Options');

        $this->Keywords = TableRegistry::get('Keywords');

		$this->Campaigns = TableRegistry::get('Campaigns');
		$this->CampaignStatisticsDaily = TableRegistry::get('CampaignStatisticsDaily');

        $this->AdGroups = TableRegistry::get('AdGroups');
        $this->AdGroupStatisticsDaily = TableRegistry::get('AdGroupStatisticsDaily');

        $this->SiteCalls = TableRegistry::get('SiteCalls');
        $this->SiteEmails = TableRegistry::get('SiteEmails');
    }

    public function yesterday()
    {
        $this->forDate(date('Y-m-d'));
    }

    public function today()
    {
        $this->forDate(date('Y-m-d', strtotime('-1 day')));
    }

    public function month()
    {
        $startDate = date('Y-m-d', strtotime('-1 month'));
        $today = date('Y-m-d');
        while ($startDate < $today) {
            $this->forDate($startDate);
            $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
        }
    }

	public function doublemonth()
    {
        $startDate = date('Y-m-d', strtotime('-2 month'));
        $today = date('Y-m-d');
        while ($startDate < $today) {
            $this->forDate($startDate);
            $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
        }
    }

    private function forDate($date)
    {
        $from = $date . ' 00:00:00';
        $to = $date . ' 23:59:59';

		$src = [
			[
				'table' => $this->AdGroup,
				'statistics' => $this->AdGroupStatisticsDaily,
				'key' => 'ad_group_id',
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
	            $record->emails = $this->SiteCalls->findCountBy($conditions);

	            $table['statistics']->saveStatistics($record);
	        }
		}

    }
}
