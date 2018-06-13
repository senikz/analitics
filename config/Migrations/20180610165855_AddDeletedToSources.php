<?php
use Migrations\AbstractMigration;

class AddDeletedToSources extends AbstractMigration
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
        $table->addColumn('deleted', 'integer', [
            'default' => null,
			'after' => 'criteria',
            'limit' => 11,
            'null' => false,
        ]);
        $table->update();
    }
}
