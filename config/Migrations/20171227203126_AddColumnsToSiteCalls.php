<?php
use Migrations\AbstractMigration;

class AddColumnsToSiteCalls extends AbstractMigration
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
		$table->addColumn('keyword_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
			'after' => 'utm_term',
        ]);
		$table->addColumn('ad_group_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
			'after' => 'utm_term',
        ]);
        $table->update();
    }
}
