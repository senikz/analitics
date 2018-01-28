<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SiteStatisticsDaily Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sites
 *
 * @method \App\Model\Entity\SiteStatisticsDaily get($primaryKey, $options = [])
 * @method \App\Model\Entity\SiteStatisticsDaily newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SiteStatisticsDaily[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SiteStatisticsDaily|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SiteStatisticsDaily patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SiteStatisticsDaily[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SiteStatisticsDaily findOrCreate($search, callable $callback = null, $options = [])
 */
class SiteStatisticsDailyTable extends Table
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

        $this->setTable('site_statistics_daily');
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
            ->numeric('cost')
            ->requirePresence('cost', 'create')
            ->notEmpty('cost');

        $validator
            ->integer('views')
            ->requirePresence('views', 'create')
            ->notEmpty('views');

        $validator
            ->integer('clicks')
            ->requirePresence('clicks', 'create')
            ->notEmpty('clicks');

        $validator
            ->integer('calls')
            ->requirePresence('calls', 'create')
            ->notEmpty('calls');

        $validator
            ->integer('emails')
            ->requirePresence('emails', 'create')
            ->notEmpty('emails');

        $validator
            ->integer('leads')
            ->requirePresence('leads', 'create')
            ->notEmpty('leads');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

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
