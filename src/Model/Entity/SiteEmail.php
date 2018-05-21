<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SiteEmail Entity
 *
 * @property int $id
 * @property int $site_id
 * @property string $details
 * @property \Cake\I18n\FrozenTime $time
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_campaign
 * @property string $utm_content
 * @property string $utm_term
 *
 * @property \App\Model\Entity\Site $site
 */
class SiteEmail extends Entity
{
	use \App\Model\LeadHelperTrait;

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

	public function getContentDetails()
	{

		if(empty($this->utm_content)) {
			return [];
		}

		$key = null;
		$details = [];

		foreach (explode('||', $this->utm_content) as $k => $param) {
			if ($k%2) {
				$details[$key] = $param;
			} else {
				$key = $param;
			}
		}

		return $details;
	}
}
