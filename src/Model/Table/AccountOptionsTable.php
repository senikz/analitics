<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AccountOptions Model
 *
 * @property \App\Model\Table\SourcesTable|\Cake\ORM\Association\BelongsTo $Sources
 *
 * @method \App\Model\Entity\AccountOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\AccountOption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AccountOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AccountOption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccountOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AccountOption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AccountOption findOrCreate($search, callable $callback = null, $options = [])
 */
class AccountOptionsTable extends Table
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

        $this->setTable('account_options');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Accounts', [
            'foreignKey' => 'account_id',
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('value', 'create')
            ->notEmpty('value');

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
        $rules->add($rules->existsIn(['account_id'], 'Accounts'));

        return $rules;
    }
}
