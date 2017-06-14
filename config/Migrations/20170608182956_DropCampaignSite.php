<?php
use Migrations\AbstractMigration;

class DropCampaignSite extends AbstractMigration
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
        $table = $this->table('campaign_site');
        $table->drop();
    }
}
