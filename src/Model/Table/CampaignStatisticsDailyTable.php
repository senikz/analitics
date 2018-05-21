<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * CampaignStatisticsDaily Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Campaigns
 *
 * @method \App\Model\Entity\CampaignStatisticsDaily get($primaryKey, $options = [])
 * @method \App\Model\Entity\CampaignStatisticsDaily newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CampaignStatisticsDaily[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CampaignStatisticsDaily|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CampaignStatisticsDaily patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CampaignStatisticsDaily[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CampaignStatisticsDaily findOrCreate($search, callable $callback = null, $options = [])
 */
class CampaignStatisticsDailyTable extends Table
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

        $this->setTable('campaign_statistics_daily');
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
            ->dateTime('date')
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
        $rules->add($rules->existsIn(['campaign_id'], 'Campaigns'));

        return $rules;
    }

	public function saveCampaignsReport(array $report, $date, $campaignKey = 'CampaignId', $measures = null)
	{
		$today = date('Y-m-d');
		$calcHourly = $today == $date;
		$campaignsTable = TableRegistry::get('Campaigns');

		if ($calcHourly) {
			$hourlyTable = TableRegistry::get('CampaignStatisticsHourly');
		}

		if (empty($measures)) {
			$measures = [
				'Clicks' => 'clicks',
				'Impressions' => 'views',
				'Cost' => 'cost',
			];
		}

		foreach ($report as $row) {
			$campaign = $campaignsTable->find()->where(['rel_id' => $row[$campaignKey]])->first();
			if (empty($campaign)) {
				continue;
			}

			$newCounts = [];

			// проверить запись в дневной статистике, есть ли текущий день
			$dailyRecord = $this->find()
				->where([
					'campaign_id' => $campaign->id,
					'date' => $date,
				])
				->first();

			if (empty($dailyRecord)) {
				$dailyRecord = $this->newEntity();
				$dailyRecord->campaign_id = $campaign->id;
				$dailyRecord->date = $date;
			}

			foreach ($measures as $mKey => $measure) {
				if (array_key_exists($mKey, $row)) {
					$newCounts[$measure] = $row[$mKey] - (empty($dailyRecord->$measure) ? 0 : $dailyRecord->$measure);
					$dailyRecord->$measure = $row[$mKey];
				}
			}

			$this->save($dailyRecord);

			if (!$calcHourly) {
				continue;
			}

			$hourlyRecord = $hourlyTable->find()
				->where([
					'campaign_id' => $campaign->id,
					'time >=' => date('Y-m-d H:00:00')
				])
				->first();

			if (empty($hourlyRecord)) {
				$hourlyRecord = $hourlyTable->newEntity();
				$hourlyRecord->campaign_id = $campaign->id;
			}

			foreach ($measures as $mKey => $measure) {
				$hourlyRecord->$measure += $newCounts[$measure];
			}

			$hourlyRecord->time = date('Y-m-d H:i:s');
			$hourlyTable->save($hourlyRecord);
		}
	}

	public function saveCampaignsContentReport(array $report, $date, $adGroupKey = 'AdGroupId', $keywordKey = 'CriteriaId',  $measures = null)
	{
		$AdGroupsTable = TableRegistry::get('AdGroups');
		$KeywordsTable = TableRegistry::get('Keywords');
		$AdGroupsStatisticsTable = TableRegistry::get('AdGroupStatisticsDaily');
		$keywordsStatisticsTable = TableRegistry::get('KeywordStatisticsDaily');

		if (empty($measures)) {
			$measures = [
				'Clicks' => 'clicks',
				'Impressions' => 'views',
				'Cost' => 'cost',
			];
		}

		$keywords = [];
		$adGroups = [];

		$statProto = [];
		foreach ($measures as $mKey => $measure) {
			$statProto[$measure] = 0;
		}

		foreach ($report as $row) {
			if (!isset($adGroups[ $row[$adGroupKey] ])) {
				$adGroups[ $row[$adGroupKey] ] = $statProto;
			}
			if (!isset($keywords[ $row[$keywordKey] ])) {
				$keywords[ $row[$keywordKey] ] = $statProto;
			}

			foreach ($measures as $mKey => $measure) {
				if (array_key_exists($mKey, $row)) {
					$adGroups[ $row[$adGroupKey] ][$measure] += (float)$row[$mKey];
					$keywords[ $row[$keywordKey] ][$measure] += (float)$row[$mKey];
				}
			}
		}

		foreach ($adGroups as $gId => $gStat) {
			$adGroup = $AdGroupsTable->find('all', ['conditions' => ['rel_id' => $gId,]])->first();
			if (empty($adGroup)) {
				continue;
			}

			$record = $AdGroupsStatisticsTable->find('all')
				->where([
					'ad_group_id' => $adGroup->id,
					'date' => $date,
				])
				->first();

			if(empty($record)) {
				$record = $AdGroupsStatisticsTable->newEntity();
			}

			$record->ad_group = $adGroup;
			foreach ($measures as $mKey => $measure) {
				$record->$measure = $gStat[$measure];
			}

			$record->date = $date;
			$AdGroupsStatisticsTable->save($record);
		}

		foreach ($keywords as $kId => $kStat) {
			$keyword = $KeywordsTable->find('all', ['conditions' => ['rel_id' => $kId,]])->first();
			if (empty($keyword)) {
				continue;
			}

			$record = $keywordsStatisticsTable->find('all')
				->where([
					'keyword_id' => $keyword->id,
					'date' => $date,
				])
				->first();

			if(empty($record)) {
				$record = $keywordsStatisticsTable->newEntity();
			}

			$record->keyword = $keyword;
			foreach ($measures as $mKey => $measure) {
				$record->$measure = $kStat[$measure];
			}
			$record->date = $date;

			$keywordsStatisticsTable->save($record);
		}
	}
}
