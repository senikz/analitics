<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

class YandexDirectComponent extends Component
{
    private $login            = 'catkitseo';
    private $token            = '37f22b0f3aa441bf8a863c7910901912';
    private $master_token    = 'FpSeIeCNgs2VwiH5';
    private $locale            = 'ru';
    private $currency        = 'RUB';
    private $url              = 'https://api.direct.yandex.ru/v4/json/';


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


    private function createRequest($request)
    {
        $request = json_encode($request);

        $opts = array(
            'http'=>array(
                'method'=>"POST",
                                  'timeout' => 60,
                'content'=>$request,
                'header' => 'Content-type: "."application/x-www-form-urlencoded',
            )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents($this->url, 0, $context);

        return json_decode($result, true);
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

    /** WORDSTAT **/

    /*
    * зарегистрировать фразы в системе
    * не более 10 фраз
    * */
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
    /*
    * получить сведения о готовности отчета
    *
    * */
    public function GetWordstatReportList()
    {
        $request = array(
            'method'=> 'GetWordstatReportList',
            'token'=> $this->token
        );

        return $this->createRequest($request);
    }
    /*
    * получить отчет с указанным идентификатором
    *
    * */
    public function GetWordstatReport($id)
    {
        $request = array(
            'method'=> 'GetWordstatReport',
            'param'=> $id,
            'token'=> $this->token
        );

        return $this->createRequest($request);
    }
    /*
    * дулить отчет с указанным идентификатором из системы
    *
    * */
    public function DeleteWordstatReport($id)
    {
        $request = array(
            'method'=> 'DeleteWordstatReport',
            'param'=> $id,
            'token'=> $this->token
        );

        return $this->createRequest($request);
    }
}
