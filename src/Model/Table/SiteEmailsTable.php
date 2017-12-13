<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SiteEmails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sites
 *
 * @method \App\Model\Entity\SiteEmail get($primaryKey, $options = [])
 * @method \App\Model\Entity\SiteEmail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SiteEmail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SiteEmail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SiteEmail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SiteEmail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SiteEmail findOrCreate($search, callable $callback = null, $options = [])
 */
class SiteEmailsTable extends Table
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

        $this->setTable('site_emails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id',
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
            ->requirePresence('details', 'create')
            ->notEmpty('details');

        $validator
            ->dateTime('time')
            ->requirePresence('time', 'create')
            ->notEmpty('time');

        $validator
            ->requirePresence('utm_source', 'create')
            ->notEmpty('utm_source');

        $validator
            ->requirePresence('utm_medium', 'create')
            ->notEmpty('utm_medium');

        $validator
            ->requirePresence('utm_campaign', 'create')
            ->notEmpty('utm_campaign');

        $validator
            ->requirePresence('utm_content', 'create')
            ->notEmpty('utm_content');

        $validator
            ->requirePresence('utm_term', 'create')
            ->notEmpty('utm_term');

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
        $rules->add($rules->existsIn(['site_id'], 'Sites'));

        return $rules;
    }

	public function findCountBy($conditions)
	{
		$query = $this->find('all', ['conditions' => $conditions,]);
		$calls = $query
			->select([
				'total_emails' => $query->func()->count('*'),
			])
			->first();

		return $calls->total_emails;
	}
}
