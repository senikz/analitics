<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;

use App\Model\Entity\Sources\Direct;
use App\Model\Entity\Sources\Adwords;

class SourcesController extends ApiController
{
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
    }

	public function view($id = null)
    {
        $source = $this->Sources->get($id)->toArray();
		unset($source['user_id']);
        $this->sendData($source);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if ($this->Validator->required($data, ['site_id', 'type', 'caption', 'criteria'])) {

				$sitesTable = TableRegistry::get('Sites');
				$site = $sitesTable->find()->where(['id' => $data['site_id']])->first();
				if (empty($site)) {
					$this->sendError(__('Site doesn`t exists or doesn`t belongs to you.'));
				}

                $source = $this->Sources->newEntity($data);
                if ($source = $this->Sources->save($source)) {
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
			$source = $this->Sources->get($id);
            $source->deleted = 1;
            if ($this->Sources->save($source)) {
				$campaignsTable = TableRegistry::get('Campaigns');
				$campaignsTable->updateAll([
                        'deleted' => 1,
                    ], [
                        'source_id' => $id
                    ]);

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

			if (isset($data['caption'])) {
				$source->caption = $data['caption'];
			}

			if (isset($data['criteria'])) {
				$source->caption = $data['criteria'];
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
