<?php
/**
 * Created by PhpStorm.
 * User: jrpikong
 * Date: 15/03/18
 * Time: 10:55
 */

namespace App\Http\Helper;


class CurlHelper
{
    private function cUrl($request, $param = array()){
        $host = 'https://popsend.myshopify.com';
        $header = [];
        $header[] = 'Content-Type:application/json';
        $header[] = 'X-Shopify-Access-Token:3ceeba8749a9d0f8d8078498f49da15c';

        $url = $host.'/'.$request;
        $json = json_encode($param);

        $ch = curl_init();
        // 2. set the options, including the url
        curl_setopt($ch, CURLOPT_URL,           $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_POST,           count($param));
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $json );
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    public function creteScriptTag ()
    {
        $url = '/admin/script_tags.json';
        $params = [
                "script_tag"=> [
                    'event' => "onload",
                    "src" =>  "https://7df3565c.ngrok.io/js/popboxlocation.js"
                ]
            ];

        return $this->cUrl($url, $params);
    }

    public function getLocker ()
    {
        $url = 'lockers';
        $params = [
                "latitude" => "",
                "longitude" => "",
                "country_name" => "Malaysia",
                "province_name" => "",
                "city_name" => ""
        ];
        return $this->curlPopsend($url, $params);
    }

    /**
     * @param string $request
     * @param array $param
     * @return mixed
     */
    private function curlPopsend($request, $param = array()){

        $host = env('POP_SEND_URL');
        $token = env('POP_SEND_KEY');
        $header = [];
        $header[] = 'Content-Type:application/json';
        $header[] = 'api-key:'.$token;

        $url = $host.'/'.$request;
        $param['token'] = $token;
        $json = json_encode($param);

        $ch = curl_init();
        // 2. set the options, including the url
        curl_setopt($ch, CURLOPT_URL,           $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_POST,           count($param));
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $json );
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        $output = curl_exec($ch);
        curl_close($ch);


        return $output;
    }

}