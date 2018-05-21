<?php
use Migrations\AbstractMigration;

class AddSiteIdToSources extends AbstractMigration
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
        $table = $this->table('sources');
        $table->addColumn('site_id', 'integer', [
            'default' => null,
			'after' => 'user_id',
            'limit' => 11,
            'null' => false,
        ]);
        $table->update();
    }
}
