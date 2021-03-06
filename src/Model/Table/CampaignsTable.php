<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Campaigns Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sites
 * @property \Cake\ORM\Association\BelongsTo $Rels
 * @property \Cake\ORM\Association\HasMany $CampaignStatisticsDaily
 * @property \Cake\ORM\Association\HasMany $CampaignStatisticsHourly
 *
 * @method \App\Model\Entity\Campaign get($primaryKey, $options = [])
 * @method \App\Model\Entity\Campaign newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Campaign[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Campaign|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Campaign patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Campaign[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Campaign findOrCreate($search, callable $callback = null, $options = [])
 */
class CampaignsTable extends Table
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

        $this->setTable('campaigns');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sources', [
            'foreignKey' => 'source_id',
        ]);
        $this->belongsTo('Accounts', [
            'foreignKey' => 'account_id',
        ]);
        /*$this->belongsTo('Rels', [
            'foreignKey' => 'rel_id',
            'joinType' => 'INNER'
        ]);*/
        $this->hasMany('CampaignStatisticsDaily', [
            'foreignKey' => 'campaign_id'
        ]);
        $this->hasMany('CampaignStatisticsHourly', [
            'foreignKey' => 'campaign_id'
        ]);
        $this->hasMany('AdGroups', [
            'foreignKey' => 'campaign_id'
        ]);
        $this->hasMany('Keywords', [
            'foreignKey' => 'campaign_id'
        ]);

        $this->hasMany('BidOptions', [
            'foreignKey' => 'rel_id',
            'conditions' => ['BidOptions.type' => 'campaign'],
            'joinType' => 'LEFT',
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
        $rules->add($rules->existsIn(['site_id'], 'Sites'));
        //$rules->add($rules->existsIn(['rel_id'], 'Rels'));

        return $rules;
    }
}
