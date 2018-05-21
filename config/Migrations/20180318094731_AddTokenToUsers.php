<?php
use Migrations\AbstractMigration;

class AddTokenToUsers extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('token', 'string', [
            'default' => null,
            'limit' => 255,
			'after' => 'password',
            'null' => false,
        ]);
        $table->update();
    }
}
