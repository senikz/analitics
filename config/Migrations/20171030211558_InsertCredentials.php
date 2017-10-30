<?php
use Migrations\AbstractMigration;
use Cake\ORM\TableRegistry;

class InsertCredentials extends AbstractMigration
{
	public function up()
	{
		$table = TableRegistry::get('Credentials');
		$table->save($table->newEntity(['id' => '1', 'type' => 'direct', 'login' => 'catkitseo', 'token' => '37f22b0f3aa441bf8a863c7910901912']));
		$table->save($table->newEntity(['id' => '2', 'type' => 'direct', 'login' => 'elama-16128487', 'token' => 'AQAAAAAeMtNsAAHlKDkOGE74SklLpMgO2XZlLvI']));

		$table = TableRegistry::get('Campaigns');
		$table->updateAll(['credential_id' => 1], ['credential_id' => '0']);
	}
}
