<?php
use Migrations\AbstractMigration;

class AddBidHitToCampaigns extends AbstractMigration
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
		$table->addColumn('bid_hit', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }
}
