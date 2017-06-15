<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Campaign Entity
 *
 * @property int $id
 * @property int $site_id
 * @property string $caption
 * @property string $type
 * @property int $rel_id
 *
 * @property \App\Model\Entity\Site $site
 * @property \App\Model\Entity\Rel $rel
 * @property \App\Model\Entity\CampaignStatisticsDaily[] $campaign_statistics_daily
 * @property \App\Model\Entity\CampaignStatisticsHourly[] $campaign_statistics_hourly
 */
class Campaign extends Entity
{

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

	public $campaignTypes = [
		'direct' => 'Кампания Яндекс.Директ'
	];

	public function getType() {
		return $this->campaignTypes[$this->type];
	}
}
