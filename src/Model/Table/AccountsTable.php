<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accounts Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\Account get($primaryKey, $options = [])
 * @method \App\Model\Entity\Account newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Account[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Account|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Account patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Account[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Account findOrCreate($search, callable $callback = null, $options = [])
 */
class AccountsTable extends Table
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

        $this->setTable('accounts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
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
