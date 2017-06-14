<?php
use Migrations\AbstractMigration;

class AddSiteIdToCampaigns extends AbstractMigration
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
        $table->addColumn('site_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
			'after' => 'id',
        ]);
        $table->update();
    }
}
