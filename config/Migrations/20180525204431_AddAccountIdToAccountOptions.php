<?php
use Migrations\AbstractMigration;

class AddAccountIdToAccountOptions extends AbstractMigration
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
        $table = $this->table('account_options');
        //$table->removeColumn('source_id');
        $table->addColumn('account_id', 'integer', [
            'default' => null,
            'limit' => 11,
			'after' => 'id',
            'null' => false,
        ]);
        $table->update();
    }
}
