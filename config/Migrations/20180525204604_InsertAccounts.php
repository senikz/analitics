<?php
use Migrations\AbstractMigration;
use Cake\ORM\TableRegistry;

class InsertAccounts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
		$table = TableRegistry::get('Accounts');

		$table->save($table->newEntity(['id' => '1', 'project_id' => 1, 'type' => 'direct', 'caption' => 'Яндекс Catkit']));
		$table->save($table->newEntity(['id' => '2', 'project_id' => 1, 'type' => 'direct', 'caption' => 'Яндекс Elama']));
		$table->save($table->newEntity(['id' => '3', 'project_id' => 1, 'type' => 'adwords', 'caption' => 'AdWords Dima']));

		$table = TableRegistry::get('AccountOptions');

		$table->save($table->newEntity(['id' => '1', 'account_id' => '1', 'name' => 'login', 'value' => 'catkitseo']));
		$table->save($table->newEntity(['id' => '2', 'account_id' => '1', 'name' => 'token', 'value' => '37f22b0f3aa441bf8a863c7910901912']));
		$table->save($table->newEntity(['id' => '3', 'account_id' => '2', 'name' => 'login', 'value' => 'elama-16128487']));
		$table->save($table->newEntity(['id' => '4', 'account_id' => '2', 'name' => 'token', 'value' => 'AQAAAAAeMtNsAAHlKDkOGE74SklLpMgO2XZlLvI']));
		$table->save($table->newEntity(['id' => '5', 'account_id' => '3', 'name' => 'clientCustomerId', 'value' => '951-305-4728']));
    }
}
