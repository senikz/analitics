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

        $accountsDir = new Folder(APP . 'Model/Entity/Account');
        $accounts = $accountsDir->find('.*\.php');

        foreach ($accounts as $file) {
            $className = '\App\Model\Entity\Account\\' . str_replace('.php', '', $file);
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
        $this->sendData(array_map(function ($source) {
            return [
                'id' => $source->id,
                'type' => $source->type,
                'caption' => $source->caption,
            ];
        }, $this->Accounts->find()->contain(false)->all()->toArray()));
    }

    public function view($id = null)
    {
        $account = $this->Accounts->get($id);
        $options = [];

        foreach ($account->allOptions() as $opt) {
            $options[] = [
                'name' => $opt->name,
                'value' => $opt->value,
            ];
        }

        $result = [
                'id' => $account->id,
                'type' => $account->type,
                'caption' => $account->caption,
                'human' => $account->getType(),
                'options' => $options,
            ];

        $this->sendData($result);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if ($this->Validator->required($data, ['type', 'caption', 'options'])) {

                $options = current(array_filter(
                    $this->requestAction('/api/accounts/types'),
                    function ($type) use ($data) {
                        return $type['type'] == $data['type'];
                    }
                ));

                if (empty($options)) {
                    return $this->sendError(__('Invalid account type.'));
                }
                $options = $options['options'];

                if (!$this->Validator->required($data['options'], array_column($options, 'name'), true)) {
                    $this->sendError($this->Validator->getLastError());
                }

                $account = $this->Accounts->newEntity();
                $account->type = $data['type'];
                $account->caption = $data['caption'];

                if ($account = $this->Accounts->save($account)) {
                    $optionsTable = TableRegistry::get('AccountOptions');
                    foreach ($options as $option) {
                        $op = $optionsTable->newEntity();
                        $op->account_id = $account->id;
                        $op->name = $option['name'];
                        $op->value = $data['options'][$option['name']];
                        $optionsTable->save($op);
                    }

                    $this->sendData([
                        'id' => $account->id,
                    ]);
                }

                $this->sendError(__('Can`t add account'));
            }

            $this->sendError($this->Validator->getLastError());
        }
    }

    public function delete($id = null)
    {
        if ($this->request->is('delete') && $id) {
            if ($this->Accounts->deleteAll(['id' => $id])) {
                $optionsTable = TableRegistry::get('AccountOptions');
                $optionsTable->deleteAll(['account_id' => $id]);

                $campaignsTable = TableRegistry::get('Campaigns');
                $campaignsTable->updateAll([
                        'deleted' => 1,
                    ], [
                        'account_id' => $id
                    ]);

                $this->sendData([]);
            } else {
                $this->sendError(__('Can`t delete account'));
            }
        }
    }

    public function edit($id)
    {
        $account = $this->Accounts->get($id);
        if (empty($account)) {
            $this->sendError(__('Account not found'), 404);
        }

        if ($this->request->is(['put'])) {
            $data = $this->request->getData();

            if (!empty($data['options'])) {
                $optionsTable = TableRegistry::get('AccountOptions');
                foreach ($account->allOptions() as $option) {
                    if (isset($data['options'][$option->name])) {
                        $option->value = $data['options'][$option->name];
                        $optionsTable->save($option);
                    }
                }
            }

            if (isset($data['caption'])) {
                $account->caption = $data['caption'];
            }

            if (isset($data['site_id'])) {
                $sitesTable = TableRegistry::get('Sites');
                $site = $sitesTable->find()->where(['id' => $data['site_id']])->first();
                if (empty($site)) {
                    $this->sendError(__('Site doesn`t exists or doesn`t belongs to you.'));
                }
                $account->site_id = $data['site_id'];
            }

            $this->Accounts->save($account, ['associated' => false]);
            $this->sendData([
                'id' => $account->id,
            ]);
        }
    }
}
