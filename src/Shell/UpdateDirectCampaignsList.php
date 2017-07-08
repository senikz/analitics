<?php
/*namespace App\Shell;

use Cake\Log\Log;
use Cake\Console\Shell;
use Cake\ORM\TableRegistry;

use App\Utility\YandexDirectApi;

class UpdateDirectCampaignsList extends Shell
{

	public function initialize()
    {
        parent::initialize();
        $this->loadModel('Campaign');
        $this->loadModel('Site');
        //$this->loadModel('CampaignStatisticsHourly');

		//$this->Campaign = TableRegistry::get('Campaigns');
    }

    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

		$parser->addSubcommand('active', [
	        'help' => 'Load active campaigns'
	    ]);

		return $parser;
    }

    public function main()
    {
        $this->out($this->OptionParser->help());
    }

	public function active() {

		$YandexDirect = new YandexDirectApi();
		$campaignsAvailable = $YandexDirect->GetCampaignsList();

		//$campaignsExisting = $this->Campaigns->find('all')->all()->toArray();
		$sites = $this->Site->find('all')->all()->toArray();

		if(!empty($campaignsAvailable)) {
			foreach($sites as $site) {

				$siteParts = explode('.', $site->domain);
				$siteName = $siteParts[count($siteParts)-2];

				foreach($campaignsAvailable as $available) {
					if(in_array($available['State'], ['ON', 'SUSPENDED']) && strpos(strtolower($available['Name']), $siteName) !== false) {

						$added = false;
						foreach($campaignsExisting as $existing) {
							if($existing->type === 'direct' && $existing->rel_id == $available['Id']) {
								$added = true;
								break;
							}
						}

						if(!$added) {
							$newCampaign = $this->Campaigns->newEntity();
							$newCampaign->site_id = $site->id;
							$newCampaign->caption = $available['Name'];
							$newCampaign->type = 'direct';
							$newCampaign->rel_id = $available['Id'];
							$this->Campaigns->save($newCampaign);
						}

					}
				}

			}
		}

	}

}
*/
