<?php
namespace App\Utility\YandexDirectApi;

use App\Utility\YandexDirectApi\Request;
use App\Utility\YandexDirectApi\Response;

class RequestJson extends Request
{
    protected $api_prefix = 'json/';

    protected function prepareBody($body, $options = [])
    {
        return json_encode([
            'method' => $options['method'],
            'params' => (object)$body
        ]);
    }

    protected function prepareHeaders($headers)
    {
        return parent::prepareHeaders(array_merge([
            'Content-type: application/json',
        ], $headers));
    }

    protected function parseResponse($service, $response)
    {
        $result = new Response;

        if (($response = json_decode($response, true)) && !empty($response['error'])) {
            $result->isError = true;
            $result->error = (object)[
                'code' => $response['error']['error_code'],
                'message' => $response['error']['error_string'],
                'details' => $response['error']['error_detail'],
            ];
        } else {
            if (!empty($response['result'][ucfirst($service)])) {
                $result->body = $response['result'][ucfirst($service)];
            }
        }

        return $result;
    }
}
