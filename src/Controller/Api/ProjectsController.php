<?php
namespace App\Controller\Api;

class ProjectsController extends ApiController
{
    public function index()
    {
        $result = [];

        $query = $this->Projects->find('all', [
            'contain' => false,
        ]);

        foreach ($query as $row) {
            $result[] = [
                'id' => $row->id,
                'caption' => $row->caption,
                'icon' => $row->icon,
            ];
        }

        $this->sendData($result);
    }

    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);

        $result = [
            'id' => $project->id,
            'caption' => $project->caption,
            'icon' => $project->icon,
        ];

        $this->sendData($result);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($this->Projects->newEntity(), $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->sendData([
                    'id' => $project->id,
                ]);
            }
            $this->sendError(__('Couldn`t create project'));
        }
    }

    public function edit($id = null)
    {
        if ($this->request->is(['put'])) {
            $project = $this->Projects->patchEntity($this->Projects->get($id), $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->sendData([]);
            }
            $this->sendError(__('Couldn`t update project'));
        }
    }
}
