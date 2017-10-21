<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BidOptions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rels
 *
 * @method \App\Model\Entity\BidOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\BidOption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BidOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BidOption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BidOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BidOption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BidOption findOrCreate($search, callable $callback = null, $options = [])
 */
class BidOptionsTable extends Table
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

        $this->setTable('bid_options');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

		$this->belongsTo('Campaigns', [
			'foreignKey' => 'rel_id',
			'conditions' => ['BidOptions.type' => 'campaign'],
            'joinType' => 'LEFT',
		]);
		$this->belongsTo('Keywords', [
			'foreignKey' => 'rel_id',
			'conditions' => ['BidOptions.type' => 'keyword'],
            'joinType' => 'LEFT',
		]);
		$this->belongsTo('AdGroups', [
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
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->numeric('max')
            ->requirePresence('max', 'create')
            ->notEmpty('max');

        $validator
            ->requirePresence('position', 'create')
            ->notEmpty('position');

        $validator
            ->integer('increment')
            ->requirePresence('increment', 'create')
            ->notEmpty('increment');

        $validator
            ->requirePresence('time_from', 'create')
            ->notEmpty('time_from');

        $validator
            ->requirePresence('time_to', 'create')
            ->notEmpty('time_to');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        //$rules->add($rules->existsIn(['rel_id'], 'Rels'));

        return $rules;
    }
}
