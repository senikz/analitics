<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdGroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rels
 * @property \Cake\ORM\Association\BelongsTo $Campaigns
 * @property \Cake\ORM\Association\HasMany $Ads
 *
 * @method \App\Model\Entity\AdGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class AdGroupsTable extends Table
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

        $this->setTable('ad_groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->belongsTo('Campaigns', [
            'foreignKey' => 'campaign_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Ads', [
            'foreignKey' => 'ad_group_id'
        ]);
		$this->hasMany('BidOptions', [
			'foreignKey' => 'rel_id',
			'conditions' => ['BidOptions.type' => 'adgroup'],
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
        $rules->add($rules->existsIn(['rel_id'], 'Rels'));
        $rules->add($rules->existsIn(['campaign_id'], 'Campaigns'));

        return $rules;
    }
}
