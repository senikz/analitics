<?php
namespace App\Shell;

use Cake\ORM\TableRegistry;

class Base extends \Cake\Console\Shell
{
    public function initialize()
    {
        parent::initialize();
		$this->Options = TableRegistry::get('Options');
    }

	protected function checkRunTime($option)
	{
		$optionPeriod = $this->Options->getByName($option . 'Time');
		$optionLastTime = $this->Options->getByName($option . 'LastRun');

		if (empty($optionPeriod)) {
			return false;
		} else {
			$optionPeriod = $optionPeriod->value;
		}

		if (strpos($optionPeriod, ':') > 0) {
			$timeRange = array_map(function ($time) {
				return explode(':', $time);
			}, explode(',', $optionPeriod));
			foreach ($timeRange as $time) {
				if (($time[0] == '*' || $time[0] == date('G')) && ($time[1] == date('i') || $time[1] == '*')) {
					return true;
				}
			}
			return false;
		} else {

			if (empty($optionLastTime)) {
				$optionLastTime = $this->Options->newEntity();
				$optionLastTime->option = $option . 'LastRun';
			}

			$currentTime = time();
			$lastTime = strtotime($optionLastTime->value);

			if( (($currentTime-$lastTime)/60) >= $optionPeriod ) {
				$optionLastTime->value = date('Y-m-d H:i:s');
				$this->Options->save($optionLastTime);
				return true;
			} else {
				return false;
			}

		}
	}

}
