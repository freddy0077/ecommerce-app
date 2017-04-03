<?php
/**
 * Created by IntelliJ IDEA.
 * User: diddy
 * Date: 4/3/2017
 * Time: 4:38 PM
 */

namespace App;


class KodeSms
{
    protected $api_key;
    protected $api_secret;
    protected $url;

    public function __construct()
    {
        $this->api_key="fd7ec210-188d-11e7-b26c-cfccb9767608";
        $this->api_secret="MA4wmU";
        $this->url = 'http://api.kodesms.com/sms/send';
    }

    public function SendSms($message,$phone_number){

        try{
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_POST, 1);

            $data = ['message'=>$message,'recipient'=>$phone_number,'sender_alias'=>'Shopaholicks'];
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("Content-Type: application/json ",
                    "ApiKey: $this->api_key",
                    "ApiSecret: $this->api_secret"
                )
            );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $result = curl_exec($ch);
            curl_close($ch);

        }catch(\Exception $e){
            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
        }
        return $result;

    }
}