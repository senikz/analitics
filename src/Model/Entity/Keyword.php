<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Keyword Entity
 *
 * @property int $id
 * @property int $rel_id
 * @property int $campaign_id
 * @property int $adword_group_id
 * @property string $keyword
 *
 * @property \App\Model\Entity\Rel $rel
 * @property \App\Model\Entity\Campaign $campaign
 * @property \App\Model\Entity\AdwordGroup $adword_group
 */
class Keyword extends Entity
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
