<?php
use Migrations\AbstractMigration;

class CreateAdGroupStatisticsDaily extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('ad_group_statistics_daily');
		$table->addColumn('ad_group_id', 'integer', [
			'default' => null,
			'limit' => 25,
			'null' => false,
		]);
		$table->addColumn('cost', 'float', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('views', 'integer', [
			'default' => null,
			'limit' => 11,
			'null' => false,
		]);
		$table->addColumn('clicks', 'integer', [
			'default' => null,
			'limit' => 11,
			'null' => false,
		]);
		$table->addColumn('date', 'date', [
			'default' => null,
			'null' => false,
		]);
		$table->create();
    }
}
