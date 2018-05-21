<?php

namespace App\Utility;

class ReportParser
{
    public static function parseCsv($report, $options = [ 'col_delimiter' => '\s'])
    {
		$reportContent = [];

		if($lines = explode(PHP_EOL, $report)) {

			$lines = array_filter($lines);

			if (count($lines) < 2) {
				return false;
			}

			$fields = empty($options['fields'])
				? preg_split('/['. $options['col_delimiter'] .']+/', $lines[1])
				: $options['fields'];

			for($lineId = 2; $lineId<(count($lines)-1); $lineId++ ) {

				$line = array_filter(preg_split('/['. $options['col_delimiter'] .']+/', $lines[$lineId]), function ($item) {
                    return $item !== '';
                });

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
