<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Source Entity
 *
 * @property int $id
 * @property string $type
 * @property string $caption
 *
 * @property \App\Model\Entity\SourceOption[] $source_options
 */
class Source extends Entity
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

    public function option($name)
    {
        if (empty($this->source_options)) {
            $sourceOptionsTable = TableRegistry::get('SourceOptions');
            $this->source_options = $sourceOptionsTable->find()->where(['source_id' => $this->id])->all();
        }

        foreach ($this->source_options as $option) {
            if ($option->name == $name) {
                return $option->value;
            }
        }

        return null;
    }

	public function hasCampaigns()
	{
		return false;
	}

	public function syncCampaigns()
	{
		return true;
	}

	public function syncCampaign(\App\Model\Entity\Campaign $campaign)
	{
		return true;
	}

	/**
	 * Loads all campaigns statistics for specified date.
	 *
	 * @param  [string] $date
	 */
	public function updateCampaignsDailyStatistics($date)
	{
		return true;
	}

	public function updateDetalizedStatistics($date)
	{}
}
