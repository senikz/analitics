<?php
use Migrations\AbstractMigration;

class AddColumnsToCampaignStatisticsDaily extends AbstractMigration
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
        $table = $this->table('campaign_statistics_daily');
		$table->addColumn('emails', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
			'after' => 'clicks',
        ]);
		$table->addColumn('calls', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
			'after' => 'clicks',
        ]);
        $table->update();
    }
}
