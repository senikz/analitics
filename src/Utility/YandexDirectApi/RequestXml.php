<?php
namespace App\Utility\YandexDirectApi;

use App\Utility\YandexDirectApi\Request;
use App\Utility\YandexDirectApi\Response;

use Cake\Utility\Xml;

class RequestXml extends Request
{
	public function send($service, $body, $options = []) {

		$ch = curl_init();

		if(!isset($options['headers'])) {
			$options['headers'] = [];
		}

		curl_setopt($ch, CURLOPT_URL, 'https:' . $this->config->url . $service);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->prepareBody($body, $options));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->prepareHeaders($options['headers']));

		$serverOutput = curl_exec ($ch);

		curl_close ($ch);

		return $this->parseResponse($service, $serverOutput);
	}

    protected function prepareBody($body, $options = [])
    {
        // TODO
        $body[key($body)]['@xmlns'] = 'http:' . $this->config->url . 'reports';

        $xmlObject = Xml::fromArray($body, ['format' => 'tags']);
        $xmlString = $xmlObject->asXML();

        return $xmlString;
    }

    protected function prepareHeaders($headers)
    {
        return parent::prepareHeaders(array_merge([
            'Content-type: text/xml',
        ], $headers));
    }

    protected function parseResponse($service, $response)
    {
		$result = new Response;

        try {
			$result = Xml::build($response);
			var_dump($result); exit;
		} catch (\Exception $e) {
			$result->body = $response;
		}

		return $result;
    }
}
