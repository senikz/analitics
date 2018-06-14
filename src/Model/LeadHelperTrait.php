<?php

namespace App\Model;

use Cake\ORM\TableRegistry;

trait LeadHelperTrait
{
    public function fillUtm($data, $fields)
	{
		foreach(array_values($fields) as $field) {
			if(!empty($data[$field])) {
				$fieldName = is_integer($key = array_search($field, $fields)) ? $field : $key;
				$this->{$fieldName} = $data[$field];
			}
		}

		$campaignId = null;

		if(!empty($this->utm_campaign) && preg_match('/[0-9]{8,20}/', $this->utm_campaign, $matches)) {
			$campaignId = $matches[0];
		}

		if($details = $this->getContentDetails()) {
			if(!empty($details['campaign_id'])) {
				$campaignId = $details['campaign_id'];
			}

			if(!empty($details['phrase_id'])) {
				$keyword = TableRegistry::get('Keywords')->find()->where(['rel_id' => $details['phrase_id']])->first();
				if(!empty($keyword)) {
					$this->keyword_id = $keyword->id;
					$this->ad_group_id = $keyword->ad_group_id;
					$this->campaign_id = $keyword->campaign_id;
					if (empty($campaignId)) {
						$campaignId = $keyword->campaign_id;
					}
				}
			}

			if (!empty($details['position_type']) && !empty($details['position']) && in_array($details['position_type'], ['premium', 'other'])) {
				$this->position = ($details['position_type'] == 'premium' ? '1' : '2') . $details['position'];
			}
		}

		if(!empty($campaignId)) {
			$camp = TableRegistry::get('Campaigns')->find()->where(['rel_id' => $campaignId])->first();
			if(!empty($camp)) {
				$this->campaign_id = $camp->id;
				$this->source_id = $camp->source_id;
			}
		}

		if (empty($this->source_id) && !empty($this->site_id) && !empty($this->utm_content)) {
			$sources = TableRegistry::get('Sources')->find()->where(['site_id' => $this->site_id])->all();
			foreach ($sources as $source) {
				if (empty($source->criteria)) {
					continue;
				}
				if (strpos($this->utm_content, $source->criteria) !== false) {
					$this->source_id = $source->id;
					break;
				}
			}
		}

		return $this;
	}

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
