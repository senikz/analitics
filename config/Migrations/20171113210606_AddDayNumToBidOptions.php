<?php
use Migrations\AbstractMigration;

class AddDayNumToBidOptions extends AbstractMigration
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
        $table = $this->table('bid_options');
		$table->addColumn('day_num', 'integer', [
            'default' => null,
            'null' => false,
        ]);
		$table->addColumn('hour_num', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }
}
