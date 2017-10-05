<?php
use Migrations\AbstractMigration;

class AddBidToCAmpaigns extends AbstractMigration
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
        $table->addColumn('bid_max', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('bid_pos', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('bid_inc', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->update();
    }
}
