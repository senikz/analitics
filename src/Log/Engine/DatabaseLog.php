<?php
namespace App\Log\Engine;

use Cake\Log\Engine\BaseLog;
use Cake\ORM\TableRegistry;

class DatabaseLog extends BaseLog
{
    public function log($level, $message, array $context = [])
    {
		$Logs = TableRegistry::get('Logs');

		$log = $Logs->newEntity();

		$log->context = implode(':', $context['scope']);
		$log->content = json_encode($message);
		$log->created = date('Y-m-d H:i:s');

        $Logs->save($log);

		return true;
    }
}
