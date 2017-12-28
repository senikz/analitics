<?php
use Migrations\AbstractMigration;

class AddPositionToSiteEmails extends AbstractMigration
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
        $table = $this->table('site_emails');
        $table->addColumn('position', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
			'after' => 'utm_term',
        ]);
        $table->update();
    }
}
