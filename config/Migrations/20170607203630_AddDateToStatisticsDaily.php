<?php
use Migrations\AbstractMigration;

class AddDateToStatisticsDaily extends AbstractMigration
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
        $table = $this->table('statistics_daily');
        $table->addColumn('date', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }
}
