<?php
use Migrations\AbstractMigration;

class RemoveBidMaxFromCampaigns extends AbstractMigration
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
        $table = $this->table('campaigns');
		$table->removeColumn('bid_max');
		$table->removeColumn('bid_pos');
		$table->removeColumn('bid_inc');
        $table->update();
    }
}
