<?php
namespace App\Utility\YandexDirectApi;

class Response
{
    public $isError = false;
    public $error;
    public $code;
    public $body;

    public function __construct()
    {
        /*if (!empty($_SERVER['REDIRECT_STATUS'])) {
            $this->code = $_SERVER['REDIRECT_STATUS'];
        }*/
        return $this;
    }
}
