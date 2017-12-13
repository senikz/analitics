<?php
use Migrations\AbstractMigration;

class RemoveTimeFromFromBidOptions extends AbstractMigration
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
		$table->removeColumn('time_from');
		$table->removeColumn('time_to');
        $table->update();
    }
}
