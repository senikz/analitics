<?php
use Migrations\AbstractMigration;

class AddDeletedToCampaigns extends AbstractMigration
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
        $table->addColumn('deleted', 'integer', [
            'default' => null,
			'after' => 'rel_id',
            'limit' => 11,
            'null' => false,
        ]);
        $table->update();
    }
}
