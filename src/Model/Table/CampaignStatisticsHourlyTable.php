<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CampaignStatisticsHourly Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Campaigns
 *
 * @method \App\Model\Entity\CampaignStatisticsHourly get($primaryKey, $options = [])
 * @method \App\Model\Entity\CampaignStatisticsHourly newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CampaignStatisticsHourly[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CampaignStatisticsHourly|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CampaignStatisticsHourly patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CampaignStatisticsHourly[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CampaignStatisticsHourly findOrCreate($search, callable $callback = null, $options = [])
 */
class CampaignStatisticsHourlyTable extends Table
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

        $this->setTable('campaign_statistics_hourly');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Campaigns', [
            'foreignKey' => 'campaign_id',
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
        $rules->add($rules->existsIn(['campaign_id'], 'Campaigns'));

        return $rules;
    }
}
