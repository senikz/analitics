<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;

use App\Model\Entity\Sources\Direct;
use App\Model\Entity\Sources\Adwords;

class AccountsController extends ApiController
{
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
    }

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
				'options' => array_map(function ($option) {
					return [
						'name' => $option,
						'caption' => __('sources.options.' . $option),
					];
				}, $className::OPTIONS),
			];
		}

		return $this->sendData($types);
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

	public function view($id = null)
    {
        $source = $this->Sources->get($id);
		$options = [];

		foreach ($source->options() as $opt) {
			$options[] = [
				'name' => $opt->name,
				'value' => $opt->value,
			];
		}

        $result = [
                'id' => $source->id,
                'site_id' => $source->site_id,
                'caption' => $source->caption,
                'type' => $source->type,
                'human' => $source->getType(),
				'options' => $options,
            ];

        $this->sendData($result);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if ($this->Validator->required($data, ['site_id', 'type', 'caption', 'options'])) {

				$sitesTable = TableRegistry::get('Sites');
				$site = $sitesTable->find()->where(['id' => $data['site_id']])->first();
				if (empty($site)) {
					$this->sendError(__('Site doesn`t exists or doesn`t belongs to you.'));
				}

				$options = current(array_filter(
					$this->requestAction('/api/sources/types'),
					function($type) use ($data) {
						return $type['type'] == $data['type'];
					}
				));

				if (empty($options)) {
					return $this->sendError(__('Invalid source type.'));
				}
				$options = $options['options'];

				if (!$this->Validator->required($data['options'], array_column($options, 'name'), true)) {
					$this->sendError($this->Validator->getLastError());
				}

                $source = $this->Sources->newEntity();
				$source->site_id = $data['site_id'];
				$source->type = $data['type'];
				$source->caption = $data['caption'];

                if ($source = $this->Sources->save($source)) {

					$optionsTable = TableRegistry::get('SourceOptions');
					foreach ($options as $option) {
						$op = $optionsTable->newEntity();
						$op->source_id = $source->id;
						$op->name = $option['name'];
						$op->value = $data['options'][$option['name']];
						$optionsTable->save($op);
					}

                    $this->sendData([
                        'id' => $source->id,
                    ]);
                }

                $this->sendError(__('Can`t add source'));
            }

            $this->sendError($this->Validator->getLastError());
        }
    }

    public function delete($id = null)
    {
        if ($this->request->is('delete') && $id) {
            if ($this->Sources->deleteAll(['id' => $id])) {
				$optionsTable = TableRegistry::get('source_options');
				$optionsTable->deleteAll(['source_id' => $id]);
                $this->sendData([]);
            } else {
                $this->sendError(__('Can`t delete source'));
            }
        }
    }

	public function edit($id)
	{
		$source = $this->Sources->get($id);

		if (empty($source)) {
			$this->sendError(__('Source not found'), 404);
		}

		if ($this->request->is(['put'])) {
			$data = $this->request->getData();

			if (!empty($data['options'])) {
				$optionsTable = TableRegistry::get('source_options');
				foreach ($source->options() as $option) {
					if (isset($data['options'][$option->name])) {
						$option->value = $data['options'][$option->name];
						$optionsTable->save($option);
					}
				}
			}

			if (isset($data['caption'])) {
				$source->caption = $data['caption'];
			}

			if (isset($data['site_id'])) {
				$sitesTable = TableRegistry::get('Sites');
				$site = $sitesTable->find()->where(['id' => $data['site_id']])->first();
				if (empty($site)) {
					$this->sendError(__('Site doesn`t exists or doesn`t belongs to you.'));
				}
				$source->site_id = $data['site_id'];
			}

			$this->Sources->save($source, ['associated' => false]);
			$this->sendData([
				'id' => $source->id,
			]);
		}
	}

}
