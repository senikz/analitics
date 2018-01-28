<?php
use Migrations\AbstractMigration;

class AddOrdersToAdGroupStatisticsDaily extends AbstractMigration
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
        $table->addColumn('orders', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
			'after' => 'leads',
        ]);
        $table->update();
    }
}
