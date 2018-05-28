<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectStatisticsDaily Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\ProjectStatisticsDaily get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectStatisticsDaily newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectStatisticsDaily[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectStatisticsDaily|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectStatisticsDaily patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectStatisticsDaily[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectStatisticsDaily findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectStatisticsDailyTable extends Table
{
	use \App\Model\StatisticsTableHelper;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('project_statistics_daily');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->numeric('ctr')
            ->requirePresence('ctr', 'create')
            ->notEmpty('ctr');

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
            ->numeric('lead_perc')
            ->requirePresence('lead_perc', 'create')
            ->notEmpty('lead_perc');

        $validator
            ->numeric('lead_cost')
            ->requirePresence('lead_cost', 'create')
            ->notEmpty('lead_cost');

        $validator
            ->integer('orders')
            ->requirePresence('orders', 'create')
            ->notEmpty('orders');

        $validator
            ->numeric('order_perc')
            ->requirePresence('order_perc', 'create')
            ->notEmpty('order_perc');

        $validator
            ->numeric('order_cost')
            ->requirePresence('order_cost', 'create')
            ->notEmpty('order_cost');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}
