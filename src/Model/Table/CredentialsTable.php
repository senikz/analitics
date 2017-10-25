<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Credentials Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rels
 * @property \Cake\ORM\Association\HasMany $Campaigns
 *
 * @method \App\Model\Entity\Credential get($primaryKey, $options = [])
 * @method \App\Model\Entity\Credential newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Credential[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Credential|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Credential patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Credential[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Credential findOrCreate($search, callable $callback = null, $options = [])
 */
class CredentialsTable extends Table
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

        $this->setTable('credentials');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Campaigns', [
            'foreignKey' => 'credential_id'
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
            ->requirePresence('login', 'create')
            ->notEmpty('login');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('token', 'create')
            ->notEmpty('token');

        $validator
            ->requirePresence('token2', 'create')
            ->notEmpty('token2');

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
        $rules->add($rules->isUnique(['login']));
        $rules->add($rules->existsIn(['rel_id'], 'Rels'));

        return $rules;
    }
}
