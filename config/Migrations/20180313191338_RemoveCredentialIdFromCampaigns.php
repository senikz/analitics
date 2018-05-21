<?php
use Migrations\AbstractMigration;

class RemoveCredentialIdFromCampaigns extends AbstractMigration
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
        $table = $this->table('campaigns');
		$table->removeColumn('credential_id');
        $table->update();
    }
}
