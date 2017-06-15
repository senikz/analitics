<?php
namespace App\Utility\YandexDirectApi;

abstract class Request {

	protected $config;
	protected $api_prefix;


	public function __construct($config) {
		$this->config = (object)$config;
        $this->config->url = $this->config->url . $this->api_prefix . $this->config->api_version . '/';
	}


	public function send($service, $body, $options = []) {

		if(!isset($options['headers'])) {
			$options['headers'] = [];
		}

		$opts = [
			'http' => [
				'method' => "POST",
				'timeout' => 60,
				'content' => $this->prepareBody($body, $options),
				'header' => join ("\r\n", $this->prepareHeaders($options['headers']))
			]
		];

		$context = stream_context_create($opts);
		$result = file_get_contents( 'https:' . $this->config->url . $service, 0, $context);

		return $this->parseResponse($service, $result);
	}

	protected function prepareHeaders($headers) {
		return array_merge([
			'Authorization: Bearer '.$this->config->token,
			'Client-Login: '.$this->config->login,
			'Accept-Language: '.$this->config->locale,
		], $headers);
	}

	abstract protected function prepareBody($body, $options = []);
	abstract protected function parseResponse($service, $response);
}
