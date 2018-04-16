<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;

use App\Model\Entity\Sources\Direct;
use App\Model\Entity\Sources\Adwords;

class SourcesController extends ApiController
{
	public function types()
	{
		$types = [];

		$sourcesDir = new Folder(APP . 'Model/Entity/Source');
		$sources = $sourcesDir->find('.*\.php');

		foreach ($sources as $file) {
			$className = '\App\Model\Entity\Source\\' . str_replace('.php', '', $file);
			$types[] = [
				'type' => $className::TYPE,
				'human' => $className::TYPE_HUMAN,
			];
		}

		$this->sendData($types);
	}

    public function index()
    {
        $this->sendData(array_map(function($source) {
			return [
				'id' => $source->id,
				'type' => $source->type,
				'caption' => $source->caption,
			];
		}, $this->Sources->find()->contain(false)->all()->toArray()));
    }

}
