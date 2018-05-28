<?php
use Migrations\AbstractMigration;

class CreateSourceStatisticsDaily extends AbstractMigration
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
		$table = $this->table('source_statistics_daily');
		$table->addColumn('source_id', 'integer', [
			'default' => null,
			'limit' => 11,
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
		$table->addColumn('ctr', 'float', [
			'default' => null,
			'null' => false,
			'after' => 'clicks',
		]);
		$table->addColumn('calls', 'integer', [
			'default' => null,
			'limit' => 11,
			'null' => false,
		]);
		$table->addColumn('emails', 'integer', [
			'default' => null,
			'limit' => 11,
			'null' => false,
		]);
		$table->addColumn('leads', 'integer', [
			'default' => null,
			'limit' => 11,
			'null' => false,
		]);
		$table->addColumn('lead_perc', 'float', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('lead_cost', 'float', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('orders', 'integer', [
			'default' => null,
			'limit' => 11,
			'null' => false,
		]);
		$table->addColumn('order_perc', 'float', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('order_cost', 'float', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('date', 'date', [
			'default' => null,
			'null' => false,
		]);
        $table->create();
    }
}
