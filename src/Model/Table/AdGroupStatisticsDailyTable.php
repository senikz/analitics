<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdGroupStatisticsDaily Model
 *
 * @property \Cake\ORM\Association\BelongsTo $AdGroups
 *
 * @method \App\Model\Entity\AdGroupStatisticsDaily get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdGroupStatisticsDaily newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdGroupStatisticsDaily[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdGroupStatisticsDaily|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdGroupStatisticsDaily patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdGroupStatisticsDaily[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdGroupStatisticsDaily findOrCreate($search, callable $callback = null, $options = [])
 */
class AdGroupStatisticsDailyTable extends Table
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

        $this->setTable('ad_group_statistics_daily');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AdGroups', [
            'foreignKey' => 'ad_group_id',
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
        $rules->add($rules->existsIn(['ad_group_id'], 'AdGroups'));

        return $rules;
    }
}
