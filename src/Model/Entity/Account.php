<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Account Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property string $type
 * @property string $caption
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Project $project
 */
class Account extends Entity
{

	const STATUS_ACTIVE = 'active';
	const STATUS_PENDING = 'pending';

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

	public static function settingsFields()
	{
		return [];
	}

	public function option($name)
	{
		foreach ($this->allOptions() as $option) {
			if ($option->name == $name) {
				return $option->value;
			}
		}

		return null;
	}

	public function allOptions()
	{
		if (empty($this->account_options)) {
			$accountOptionsTable = TableRegistry::get('AccountOptions');
			$this->account_options = $accountOptionsTable->find()->where(['account_id' => $this->id])->all();
		}

		return $this->account_options;
	}

	public function isCampaignable()
	{
		return false;
	}

	public function auth()
	{
		return null;
	}

	public function getType()
	{
		return static::TYPE_HUMAN;
	}

	public function syncCampaigns()
	{
		return true;
	}

	public function syncCampaign(\App\Model\Entity\Campaign $campaign)
	{
		return true;
	}

	public function dailyCronJob($date)
	{}

	public function cronJob()
	{}
}
