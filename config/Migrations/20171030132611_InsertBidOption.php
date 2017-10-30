<?php
use Migrations\AbstractMigration;
use Cake\ORM\TableRegistry;

class InsertBidOption extends AbstractMigration
{
	public function up()
	{
		$table = TableRegistry::get('Options');
		$table->save($table->newEntity(['option' => 'BidCronTime', 'value' => '5']));
		$table->save($table->newEntity(['option' => 'BidCronLastRun', 'value' => '2017-08-08 00:00:00']));
	}

}
