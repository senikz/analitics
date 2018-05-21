<?php
use Migrations\AbstractMigration;

class AddRelTypeToCampaigns extends AbstractMigration
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
        $table->addColumn('rel_type', 'string', [
            'default' => null,
			'after' => 'rel_id',
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
