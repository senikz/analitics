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
            //'FieldNames' => ['Id', 'Name']
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
	            'IncludeVAT' => 'NO',
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

    //private $fin_token	= $connect['finance_token'];
    //private $op_num		= $connect['operation_num'];

    /*public function get($method, $params=null)
    {
        if($params)
            $request = array(
                'token'=> $this->token,
                'method'=> $method,
                'param'=> $this->utf8($params),
                'locale'=> $this->locale
            );
        else
            $request = array(
                'token'=> $this->token,
                'method'=> $method,
                'locale'=> $this->locale
            );

        if($method == 'TransferMoney')
            $request = array(
                'method'=> 'TransferMoney',
                'token'=> $this->token,
                'finance_token'=> $this->fin_token,
                'operation_num'=> $this->op_num,
                'param'=>$params
            );

        return $this->createRequest($request);
    }*/
/*
    private function utf8($struct)
    {
        foreach ($struct as $key => $value) {
            if (is_array($value)) {
                $struct[$key] = $this->utf8($value);
            } elseif (is_string($value)) {
                $struct[$key] = utf8_encode($value);
            }
        }
        return $struct;
    }

    private function sendRequest($request) {

        $request = json_encode($request);

        $opts = array(
            'http' => array(
                'method' => "POST",
                'timeout' => 60,
                'content' => $request,
                'header' => 'Content-type: "."application/x-www-form-urlencoded',
            )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents($this->url, 0, $context);

        return json_decode($result, true);
    }

    private function createRequest($request)
    {
        return $this->sendRequest($request);
    }


    public function GetRegions()
    {
        $request = array(
            'method'=> 'GetRegions',
            'token'=> $this->token
        );
        return $this->createRequest($request);
    }

    public function GetCampaignsList()
    {
        $request = array(
            'token'=> $this->token,
            'method'=> 'GetCampaignsList',
            'locale'=> $this->locale
        );

        return $this->createRequest($request);
    }

    public function TransferMoney($params)
    {
        $request = array(
            'method'=> 'TransferMoney',
            'token'=> $this->token,
            'finance_token'=> $this->fin_token,
            'operation_num'=> $this->op_num,
            'param'=>$params
        );

        return $this->createRequest($request);
    }

    public function GetSummaryStat($ids, $start, $end)
    {
        $request = array(
            'method'=> 'GetSummaryStat',
            'token'=> $this->token,
            'param'=> array(
                'CampaignIDS'    => $ids,
                'StartDate'        => $start,
                'EndDate'        => $end
            )
        );

        return $this->createRequest($request);
    }

    public function GetCampaignsParams($ids)
    {
        $request = array(
            'method'=> 'GetCampaignsParams',
            'token'=> $this->token,
            'param'=> array(
                'CampaignIDS'    => $ids
            )
        );

        return $this->createRequest($request);
    }

    public function CreateNewWordstatReport($params)
    {
        if (is_array($params['Phrases'])) {
            foreach ($params['Phrases'] as $key => $phrase) {
                $params['Phrases'][$key] = utf8_encode($phrase);
            }

            $request = array(
                'method'=> 'CreateNewWordstatReport',
                'token'=> $this->token,
                'param'=>$params
            );

            return $this->createRequest($request);
        }
    }

    public function GetWordstatReportList()
    {
        $request = array(
            'method'=> 'GetWordstatReportList',
            'token'=> $this->token
        );

        return $this->createRequest($request);
    }

    public function GetWordstatReport($id)
    {
        $request = array(
            'method'=> 'GetWordstatReport',
            'param'=> $id,
            'token'=> $this->token
        );

        return $this->createRequest($request);
    }

    public function DeleteWordstatReport($id)
    {
        $request = array(
            'method'=> 'DeleteWordstatReport',
            'param'=> $id,
            'token'=> $this->token
        );

        return $this->createRequest($request);
    }*/
}
