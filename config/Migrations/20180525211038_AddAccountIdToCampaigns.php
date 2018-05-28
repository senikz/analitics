<?php
use Migrations\AbstractMigration;

class AddAccountIdToCampaigns extends AbstractMigration
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
        $table->addColumn('account_id', 'integer', [
            'default' => null,
            'limit' => 11,
			'after' => 'source_id',
            'null' => false,
        ]);
        $table->update();
    }
}
