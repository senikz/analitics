<?php
use Migrations\AbstractMigration;

class AddTypeToCredentials extends AbstractMigration
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
        $table = $this->table('credentials');
        $table->addColumn('type', 'string', [
            'default' => null,
			'after' => 'id',
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
