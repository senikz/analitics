<?php

namespace App\Utility;

class ReportParser
{
    public static function parseCsv($report, $options = [ 'col_delimiter' => '\s' ])
    {
		$reportContent = [];

		if($lines = explode(PHP_EOL, $report)) {

			$lines = array_filter($lines);
			$fields = explode(',', $lines[1]);

			for($lineId = 2; $lineId<(count($lines)-1); $lineId++ ) {

				$line = array_filter(preg_split('/['. $options['col_delimiter'] .']+/', $lines[$lineId]));

				if(!empty($line) && count($line) == count($fields)) {
					$reportLine = [];
					foreach($fields as $num => $field) {
						$reportLine[$field] = $line[$num];
					}
					$reportContent[] = $reportLine;
				}
			}
		}

		return $reportContent;
    }
}
