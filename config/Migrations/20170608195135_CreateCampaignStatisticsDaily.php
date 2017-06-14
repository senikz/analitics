<?php
use Migrations\AbstractMigration;

class CreateCampaignStatisticsDaily extends AbstractMigration
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
		$table->addColumn('campaign_id', 'integer', [
			'default' => null,
			'limit' => 11,
			'null' => false,
		]);
		$table->addColumn('cost', 'float', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('views', 'integer', [
			'default' => null,
			'limit' => 11,
			'null' => false,
		]);
		$table->addColumn('clicks', 'integer', [
			'default' => null,
			'limit' => 11,
			'null' => false,
		]);
		$table->addColumn('date', 'datetime', [
			'default' => null,
			'null' => false,
		]);
		$table->create();
    }
}
