<?php
namespace App\Shell;

class AggregateStatisticsHelper extends \Cake\Console\Shell
{
    public function today()
    {
        $this->forDate(date('Y-m-d'));
    }

    public function yesterday()
    {
        $this->forDate(date('Y-m-d', strtotime('-1 day')));
    }

    public function month()
    {
        $startDate = date('Y-m-d', strtotime('-1 month'));
        $today = date('Y-m-d');
        while ($startDate < $today) {
            $this->forDate($startDate);
            $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
        }
    }

	public function doublemonth()
    {
        $startDate = date('Y-m-d', strtotime('-2 month'));
        $today = date('Y-m-d');
        while ($startDate < $today) {
            $this->forDate($startDate);
            $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
        }
    }

	public function quarterly()
    {
        $startDate = date('Y-m-d', strtotime('-3 month'));
        $today = date('Y-m-d');
        while ($startDate < $today) {
            $this->forDate($startDate);
            $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
        }
    }

	public function semiannually()
    {
        $startDate = date('Y-m-d', strtotime('-6 month'));
        $today = date('Y-m-d');
        while ($startDate < $today) {
            $this->forDate($startDate);
            $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
        }
    }
}
