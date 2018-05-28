<?php
use Migrations\AbstractMigration;

class AlterSourceOptionsRenameToAccountOptions extends AbstractMigration
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
        $table = $this->table('source_options')->rename('account_options');
    }
}
