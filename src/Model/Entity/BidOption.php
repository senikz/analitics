<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BidOption Entity
 *
 * @property int $id
 * @property string $type
 * @property int $rel_id
 * @property float $max
 * @property string $position
 * @property int $increment
 * @property string $time_from
 * @property string $time_to
 * @property int $status
 *
 * @property \App\Model\Entity\Rel $rel
 */
class BidOption extends Entity
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

	public function getObject() {
		return [
			'max' => $this->max,
			'position' => $this->position,
			'increment' => $this->increment,
			'active' => $this->status,
		];
	}
}
