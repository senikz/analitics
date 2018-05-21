<?php
use Migrations\AbstractMigration;

class AddUserIdToSources extends AbstractMigration
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
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
			'after' => 'id',
            'null' => false,
        ]);
        $table->update();


		$table = $this->table('campaigns');
		$table->addColumn('user_id', 'integer', [
			'default' => null,
			'limit' => 11,
			'after' => 'id',
			'null' => false,
		]);
		$table->update();
    }
}
