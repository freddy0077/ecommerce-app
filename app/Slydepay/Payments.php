<?php
/**
 * Created by PhpStorm.
 * User: diddy
 * Date: 4/25/2016
 * Time: 7:18 PM
 */

namespace App\SlydePay;


use App;

class Payments
{
    private $api_version;
    private $merchant_email;
    private $merchant_secret_key;

    public $service_type = "C2B";
    public $integration_mode = false;
    public $paylive="https://app.slydepay.com.gh/payLIVE/detailsnew.aspx?pay_token=";
    protected $ns="http://www.i-walletlive.com/payLIVE";
    protected $wsdl="https://app.slydepay.com.gh/webservices/paymentservice.asmx?wsdl";

    public $order_id;
    public $subtotal;
    public $shipping;
    public $tax_amount;
    public $amount;
    public $comment;
    public $comment2;
    public $order_items;
    public $pay_token;
    public $trans_id;

    public  $slyde;

    public function __construct(){
        $this->merchant_secret_key = env('SLYDEPAY_MERCHANT_SECRET');
        $this->merchant_email =      env('SLYDEPAY_MERCHANT_EMAIL');
        $this->api_version    =      env('SLYDEPAY_API_VERSION');

        $this->integration_mode = App::environment('local')?true:false;
//        $this->integration_mode = true;

        $this->slyde =
            new SlydepayConnector(
            $this->ns,
            $this->wsdl,
            $this->api_version,
            $this->merchant_email,
            $this->merchant_secret_key,
            $this->service_type,
            $this->integration_mode
        );
    }

    public function initiatePayment(){

            $order_id = $this->order_id;
            $subtotal = isset($this->subtotal) ? $this->subtotal : 0;
            $shipping_cost = isset($this->shipping) ? $this->shipping : 0;
            $tax_amount = isset($this->tax_amount) ? $this->tax_amount : 0;
            // this field is mandatory
            $amount = $this->amount;
            $comment = isset($this->comment) ? $this->comment : '';
            $comment2 = isset($this->comment2) ? $this->comment2 : '';
            $order_items = isset($this->order_items) ? $this->order_items : ['KODESMS CREDITS PURCHASE'];

        return $this->slyde->ProcessPaymentOrder($order_id,$subtotal,$shipping_cost,$tax_amount,$amount,$comment,$comment2,$order_items);

    }

    public function confirmTransaction(){

        $token = $this->pay_token;
        $trans_id = $this->trans_id;

        return $this->slyde->ConfirmTransaction($token,$trans_id);
    }

}