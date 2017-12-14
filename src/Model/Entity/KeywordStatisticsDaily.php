<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * KeywordStatisticsDaily Entity
 *
 * @property int $id
 * @property int $keyword_id
 * @property float $cost
 * @property int $views
 * @property int $clicks
 * @property \Cake\I18n\FrozenDate $date
 *
 * @property \App\Model\Entity\Keyword $keyword
 */
class KeywordStatisticsDaily extends Entity
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
