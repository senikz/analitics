<?php
namespace App\Shell;

use Cake\ORM\TableRegistry;

class SyncSourcesShell extends \Cake\Console\Shell
{
    public function initialize()
    {
        parent::initialize();
		$this->Sources = TableRegistry::get('Sources');
    }

	public function all()
	{
		$sources = $this->Sources->find()->all();

		foreach ($sources as $source) {
			$source->syncCampaigns();
		}
	}

}
