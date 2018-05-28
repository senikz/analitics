<?php

namespace App\Model;

use Cake\ORM\TableRegistry;

trait FormatHelperTrait
{
    public function clearUser($data)
	{
		if (is_object($data) && method_exists($data, 'toArray')) {
            $data = $data->toArray();
        } else {
            $data = (array) $data;
        }

		return array_map(function($source) {
			unset($source['user_id']);
			return $source;
		}, $data);
	}
}
