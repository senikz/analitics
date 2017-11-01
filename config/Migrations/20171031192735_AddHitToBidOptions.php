<?php
use Migrations\AbstractMigration;

class AddHitToBidOptions extends AbstractMigration
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
        $table = $this->table('bid_options');
        $table->addColumn('hit', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }
}
