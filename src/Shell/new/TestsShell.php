<?php
namespace App\Shell;

use Cake\ORM\TableRegistry;

use Google\AdsApi\AdWords\Reporting\v201802\ReportDefinitionDateRangeType;

class TestsShell extends \Cake\Console\Shell
{
    public function initialize()
    {
        parent::initialize();

		$this->Accounts = TableRegistry::get('Accounts');
		$this->Sources = TableRegistry::get('Sources');

        $this->SiteCalls = TableRegistry::get('SiteCalls');
        $this->SiteEmails = TableRegistry::get('SiteEmails');
        $this->Sources = TableRegistry::get('Sources');
        $this->Campaigns = TableRegistry::get('Campaigns');
        $this->Keywords = TableRegistry::get('Keywords');
        $this->AdGroups = TableRegistry::get('AdGroups');
        $this->BidOptions = TableRegistry::get('BidOptions');

		$this->KSD = TableRegistry::get('KeywordStatisticsDaily');
		$this->CSD = TableRegistry::get('CampaignStatisticsDaily');
		$this->AGSD = TableRegistry::get('AdGroupStatisticsDaily');
    }

    public function main()
    {
		$a = $this->AGSD->find()->where(['id' => 1])->first();
		$a->calls = 324;
		var_dump($this->AGSD->save($a));

		//$account = $this->Accounts->find()->where(['id' => 4])->first();
		//$campaign = $this->Campaigns->find()->where(['id' => 85])->first();

		//$account->syncCampaignAdGroups($campaign);
		//$account->syncCampaignKeywords($campaign);

		//var_dump($b);
		//var_dump($a);
		//$a->syncCampaigns();

		/*$this->CSD->saveCampaignsReport([
			[
				'CampaignId' => 281898304,
				'Impressions' => 100,
				'Clicks' => 14,
				'Cost' => 10.10,
			]
		], '2018-05-05');*/

		//$c = $this->Campaigns->find()->where(['id' => 79])->first();
		//$rep = $a->loadCampaignStatisticsReport($c, ReportDefinitionDateRangeType::YESTERDAY, ['CampaignId', 'AdGroupId', 'Criteria', 'Id', 'Impressions', 'Clicks', 'Cost']);
		//$rep = $b->updateCampaignsContentStatistics('2018-05-02');
//var_dump($rep);
		//$this->CSD->create([], date('Y-m-d'));


        /*$a = $this->Campaigns->find()->contain(['Sources'])->first();
        var_dump($a->source->getProvider());
        //$a = $this->Sources->find()->contain(['SourceOptions'])->first();
        //var_dump($a);
        exit;
*/
		// Заполнить site_costs по полю comment
		// Заполнить user_id единицами
		//

		//$this->fill_leads();
    }

	public function fill_leads()
	{
		foreach($this->SiteCalls->find()->all() as $call) {
			if($call->campaign_id > 100000) {
				$camp = $this->Campaigns->find('all')->where(['rel_id' => $call->campaign_id])->first();
				if(!empty($camp)) {
					$call->campaign_id = $camp->id;
					$this->SiteCalls->save($call);
				}
			}
		}
		foreach($this->SiteEmails->find()->all() as $call) {
			if($call->campaign_id > 100000) {
				$camp = $this->Campaigns->find('all')->where(['rel_id' => $call->campaign_id])->first();
				if(!empty($camp)) {
					$call->campaign_id = $camp->id;
					$this->SiteEmails->save($call);
				}
			}
		}
	}

}
