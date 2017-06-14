<?php
use Migrations\AbstractMigration;

class AddMailsToSiteStatisticsHourly extends AbstractMigration
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
        $table = $this->table('site_statistics_hourly');
        $table->addColumn('mails', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
			'after' => 'calls',
        ]);
        $table->update();
    }
}
