<?php
use Migrations\AbstractMigration;
use Cake\ORM\TableRegistry;

class UpdateSourceId extends AbstractMigration
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
		$table = TableRegistry::get('Campaigns');

		$table->updateAll(['source_id' => 1], ['source_id' => 0]);
		$table->updateAll(['account_id' => 1], ['source_id' => 1]);
    }
}
