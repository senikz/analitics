<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SourceStatisticsDaily Entity
 *
 * @property int $id
 * @property int $source_id
 * @property float $cost
 * @property int $views
 * @property int $clicks
 * @property float $ctr
 * @property int $calls
 * @property int $emails
 * @property int $leads
 * @property float $lead_perc
 * @property float $lead_cost
 * @property int $orders
 * @property float $order_perc
 * @property float $order_cost
 * @property \Cake\I18n\FrozenDate $date
 *
 * @property \App\Model\Entity\Source $source
 */
class SourceStatisticsDaily extends Entity
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
