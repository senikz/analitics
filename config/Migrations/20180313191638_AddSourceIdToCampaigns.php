<?php
use Migrations\AbstractMigration;

class AddSourceIdToCampaigns extends AbstractMigration
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
		$table->addColumn('source_id', 'integer', [
            'default' => null,
            'null' => false,
			'after' => 'id',
        ]);
        $table->update();
    }
}
