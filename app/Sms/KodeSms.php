<?php
/**
 * Created by IntelliJ IDEA.
 * User: diddy
 * Date: 4/3/2017
 * Time: 4:38 PM
 */

namespace App\Sms;


class KodeSms
{
    protected $api_key;
    protected $api_secret;
    protected $url;

    public function __construct()
    {
        $this->api_key=env('sms_api_key');
        $this->api_secret=env('sms_api_secret');
        $this->url = 'http://api.kodesms.com/sms/send';
    }


    public function sendSms($message,$phone_number){

        $client = new \GuzzleHttp\Client();

        $data = ['message'=>$message,'recipient'=>$phone_number,'sender_alias'=>'My Shop'];

        $headers = [
//            'Authorization' => 'Bearer xoxp-274774838722-274259332529-275690747350-884b751f94be3237cebb216483f2e711' ,
            'Accept'        => 'application/json',
            "ApiKey"  => $this->api_key,
            "ApiSecret" => $this->api_secret
        ];

        $response = $client->request('POST', $this->url, [
            'headers' => $headers,
            'form_params' => $data
        ]);

        $responseJson =  json_decode(json_encode($response->getBody()->getContents()),true);
        return $responseJson;
    }
}

class KodeSmsException extends \Exception{

}