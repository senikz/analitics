<?php
use Migrations\AbstractMigration;

class AddSourceIdToSiteCalls extends AbstractMigration
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
        $table = $this->table('site_calls');
        $table->addColumn('source_id', 'integer', [
            'default' => null,
            'limit' => 11,
			'after' => 'position',
            'null' => false,
        ]);
        $table->update();
    }
}
