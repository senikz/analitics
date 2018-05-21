<?php
namespace App\Shell;

use Cake\ORM\TableRegistry;

class SourcesShell extends \Cake\Console\Shell
{
    public function initialize()
    {
        parent::initialize();
		$this->Sources = TableRegistry::get('Sources');
    }

	public function sync()
	{
		$sources = $this->Sources->find()->all();
		foreach ($sources as $source) {
			$source->syncCampaigns();
		}
	}

}
