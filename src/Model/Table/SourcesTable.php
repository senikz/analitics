<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sources Model
 *
 * @property \Cake\ORM\Association\HasMany $SourceOptions
 *
 * @method \App\Model\Entity\Source get($primaryKey, $options = [])
 * @method \App\Model\Entity\Source newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Source[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Source|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Source patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Source[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Source findOrCreate($search, callable $callback = null, $options = [])
 */
class SourcesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('sources');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('SourceOptions', [
            'foreignKey' => 'source_id'
        ]);
        $this->hasMany('Campaigns', [
            'foreignKey' => 'source_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('caption', 'create')
            ->notEmpty('caption');

        return $validator;
    }

	public function beforeFind($event, $query, $options, $primary)
    {
        $containsMap = $query->getEagerLoader()->associationsMap($this);

        $query->hydrate(false)->formatResults(function ($results) use ($containsMap) {
            return $results->map(function ($row) use ($containsMap) {
				if (is_object($row)) {
					$row = $row->toArray();
				}
                if (!empty($containsMap)) {
                    foreach ($containsMap as $contain) {
                        if (empty($row[$contain['targetProperty']])) {
                            continue;
                        }
                        if ($contain['canBeJoined']) {
                            $row[$contain['targetProperty']] = new $contain['entityClass']($row[$contain['targetProperty']]);
                        } else {
                            foreach ($row[$contain['targetProperty']] as $key => $prop) {
                                $row[$contain['targetProperty']][$key] = new $contain['entityClass']($prop);
                            }
                        }
                    }
                }
                $entityClassName = $this->getEntityClass();
                if (!empty($row['type'])) {
                    $entityClassName .= '\\' . ucfirst($row['type']);
                }
                return new $entityClassName($row);
            });
        });
	}
}
