<?php
use Migrations\AbstractMigration;

class AddCtrToSiteStatisticsDaily extends AbstractMigration
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
        $table = $this->table('site_statistics_daily');
		$table->addColumn('ctr', 'float', [
            'default' => null,
            'null' => false,
			'after' => 'clicks',
        ]);
        $table->addColumn('lead_perc', 'float', [
            'default' => null,
            'null' => false,
			'after' => 'leads',
        ]);
        $table->addColumn('lead_cost', 'float', [
            'default' => null,
            'null' => false,
			'after' => 'lead_perc',
        ]);
        $table->addColumn('order_perc', 'float', [
            'default' => null,
            'null' => false,
			'after' => 'orders',
        ]);
        $table->addColumn('order_cost', 'float', [
            'default' => null,
            'null' => false,
			'after' => 'order_perc',
        ]);
        $table->update();
    }
}
