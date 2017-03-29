<?php
/**
 * Created by IntelliJ IDEA.
 * User: diddy
 * Date: 3/29/2017
 * Time: 7:56 AM
 */

namespace App;


class MpowerPayment
{

    public function MobilePayment($name,$phone_number,$email,$amount){

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://app.mpowerpayments.com/api/v1/direct-mobile/charge",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{ \"customer_name\" : \"$name\", \"customer_phone\" : \"$phone_number\", \"customer_email\" : \"$email\", \"wallet_provider\" : \"MTN\", \"merchant_name\" : \"Shopaholicks\", \"amount\" : \"$amount\" }",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/json",
        "mp-master-key: 6aa08205-b195-467b-ad0a-a761fc210d30",
        "mp-private-key: live_private_e_cbpF28gEH9SSgxDnK-_niztNg",
        "mp-token: 85b97819a15b51648135",
        "postman-token: 712f774a-6c77-46b7-5e24-c780b424f0b2"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $results =  json_decode($response,true);
    return $results;
}
    }

    public function CheckStatus($token)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://app.mpowerpayments.com/api/v1/direct-mobile/status",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>  "{ \"token\" : \"$token\"}",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json",
                "mp-master-key: 6aa08205-b195-467b-ad0a-a761fc210d30",
                "mp-private-key: live_private_e_cbpF28gEH9SSgxDnK-_niztNg",
                "mp-token: 85b97819a15b51648135",
                "postman-token: 74d935ed-7178-bd55-7cdc-825b9b53f31a"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $results =  json_decode($response,true);
            return $results;
        }
    }

}