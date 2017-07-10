<?php
/*namespace App\Utility;

class CalltouchApi
{

	public $lastError;

    private $config = [
        'token' => '552683542ct2a9485f241eae9e8e17e8443ecf2ebb8',
        'url'   => 'http://api.calltouch.ru/calls-service/RestAPI/',
    ];

	protected function sendRequest($site_id, $method, $params = [], $option = []) {

		$params['clientApiId'] = $this->config['token'];

		$queryString = [];
		foreach($params as $k => $v) {
			$queryString[] = $k . '=' . $v;
		}

		if(!isset($options['headers'])) {
			$options['headers'] = [];
		}

		$opts = [
			'http' => [
				'method' => "GET",
				'timeout' => 60,
				'content' => [],
				'header' => join ("\r\n", $options['headers']),
			]
		];

		$url = $this->config['url'] . $site_id . '/' . $method . '?' . join('&', $queryString);


var_dump($url);
		$context = stream_context_create($opts);
		var_dump($context);
		$result = file_get_contents($url, 0, $context);
var_dump($result);
exit;
		return $this->parseResponse($service, $result);
	}



	public function getDailyCalls($site_id, $date = null) {

		$time = $date ? strtotime($date) : time();

		$date = date('d/m/Y', $time);

		return $this->sendRequest($site_id, 'calls-diary/calls', ['dateFrom' => $date, 'dateTo' => $date]);
	}

}
*/
