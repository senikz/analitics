<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SiteStatisticsHourly Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sites
 *
 * @method \App\Model\Entity\SiteStatisticsHourly get($primaryKey, $options = [])
 * @method \App\Model\Entity\SiteStatisticsHourly newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SiteStatisticsHourly[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SiteStatisticsHourly|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SiteStatisticsHourly patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SiteStatisticsHourly[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SiteStatisticsHourly findOrCreate($search, callable $callback = null, $options = [])
 */
class SiteStatisticsHourlyTable extends Table
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

        $this->setTable('site_statistics_hourly');
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
            ->integer('calls')
            ->requirePresence('calls', 'create')
            ->notEmpty('calls');

        $validator
            ->integer('mails')
            ->requirePresence('mails', 'create')
            ->notEmpty('mails');

        $validator
            ->integer('orders')
            ->requirePresence('orders', 'create')
            ->notEmpty('orders');

        $validator
            ->dateTime('time')
            ->requirePresence('time', 'create')
            ->notEmpty('time');

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
}
