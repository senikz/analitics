<?php
namespace App\Utility;

use App\Utility\YandexDirectApi\RequestJson;
use App\Utility\YandexDirectApi\RequestXml;

class YandexDirectApi
{

	public $lastError;

    private $config = [
        'login'        => 'catkitseo',
        'token'        => '37f22b0f3aa441bf8a863c7910901912',
        'master_token' => 'FpSeIeCNgs2VwiH5',
        'locale'       => 'ru',
        'currency'     => 'RUB',
        'url'          => '//api.direct.yandex.com/',
		'api_version'  => 'v5',
    ];

    private function prepareResponse($response)
    {
        if ($response->isError) {
            //throw new \Exception($response->error->message . $response->error->details);
            $this->lastError = $response->error->message . $response->error->details;
            return false;
        } else {
            return $response->body;
        }
    }

	public function checkDictionaries() {
		$apiRequest = new RequestJson($this->config);
        $response = $apiRequest->send('changes', [], [
            'method' => 'checkDictionaries'
        ]);
        return $this->prepareResponse($response);
	}

    public function GetCampaignsList()
    {
        $request = [
            'SelectionCriteria' => (new \stdClass),
            'FieldNames' => ['BlockedIps','ExcludedSites','Currency','DailyBudget','Notification','EndDate','Funds','ClientInfo','Id','Name','NegativeKeywords','RepresentedBy','StartDate','Statistics','State','Status','StatusPayment','StatusClarification','SourceId','TimeTargeting','TimeZone','Type']
        ];

        $apiRequest = new RequestJson($this->config);

        $response = $apiRequest->send('campaigns', $request, [
            'method' => 'get'
        ]);
        return $this->prepareResponse($response);
    }


    public function createStatisticsReport($campaign_ids, $options = [])
    {
        $period = 'TODAY';
        if (isset($options['period'])) {
            // TODO
            $period = 'CUSTOM_DATE';
        }

		$fields = ['CampaignId', 'Cost', 'Impressions', 'Clicks'];

        $request = [
			'ReportDefinition' => [
	            'SelectionCriteria' => [
	                'Filter' => [
	                    'Field' => 'CampaignId',
	                    'Operator' => 'IN',
	                    'Values' => $campaign_ids,
	                ]
	            ],
				'FieldNames' => $fields,
				'ReportName' => 'Test request 1001',
	            'ReportType' => 'CAMPAIGN_PERFORMANCE_REPORT',
	            'DateRangeType' => $period,
	            'Format' => 'TSV',
	            'IncludeVAT' => ' Yes',
	            'IncludeDiscount' => 'NO',
			]
        ];

		$apiRequest = new RequestXml($this->config);

		$response = $apiRequest->send('reports', $request, [
			'headers' => [
            	'processingMode: online',
            	'returnMoneyInMicros: false'
			]
        ]);

		$response = $this->prepareResponse($response);

		return $this->parseReportAnswer($response, $fields);
    }

	private function parseReportAnswer($report, $fields) {

		$reportContent = [];

		if($lines = explode(PHP_EOL, $report)) {
			$lines = array_filter($lines);

			for($lineId = 2; $lineId<(count($lines)-1); $lineId++ ) {
				$line = array_filter(preg_split('/[\s]+/', $lines[$lineId]));

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

    public function getStatisticsReportStatus()
    {
        //
    }

    public function getStatisticsReportResult()
    {
        //
    }

}
