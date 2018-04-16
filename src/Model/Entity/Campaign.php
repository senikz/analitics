<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class Campaign extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

	public function getType()
	{
		return strtolower((new \ReflectionClass($this))->getShortName());
	}

	public function getTypeHuman()
	{}

	public function sync()
	{
		return false;
	}

    public function getSource()
    {
        if (empty($this->Sources)) {
            $sourceOptionsTable = TableRegistry::get('SourceOptions');
            $this->SourceOptions = $sourceOptionsTable->find()->where(['source_id' => $this->id])->all();
        }

        foreach ($this->SourceOptions as $option) {
            if ($option->name == $name) {
                return $option->value;
            }
        }

        return null;
    }

}
