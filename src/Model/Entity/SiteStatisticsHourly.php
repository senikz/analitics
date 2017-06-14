<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SiteStatisticsHourly Entity
 *
 * @property int $id
 * @property int $site_id
 * @property int $calls
 * @property int $mails
 * @property int $orders
 * @property \Cake\I18n\FrozenTime $time
 *
 * @property \App\Model\Entity\Site $site
 */
class SiteStatisticsHourly extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
