<?php
/**
 * Created by IntelliJ IDEA.
 * User: Freddy
 * Date: 11/6/2017
 * Time: 10:09 PM
 */

namespace App\Hubtel;


use OVAC\HubtelPayment\Api\Transaction\ReceiveMoney;
use OVAC\HubtelPayment\Config;

class HubtelPaymentAdapter implements \App\Hubtel\paymentAdapter
{

    /**
     * @var ReceiveMoney
     */
    protected $payment;
    protected $config;

    /**
     * HubtelPaymentAdapter constructor.
     */
    public function __construct()
    {
        // First Create configuration with your Hubtel Developer Credentials
       // The Account Number, ClientID and ClientSecret accordingly.
        $this->config = new Config('HM2005170022', 'lkafdvix', 'phjnmzig');
//        return $payment = (new ReceiveMoney())->from('0240120250')
//            ->setAmount(1)
//            ->description('Description')
//            ->customerName('Fred')
//            ->callback('http://shopaholick.dev/pay-call-back')
//            ->setChannel('mtn-gh')
//            ->injectConfig($this->config)
//            ->run();

        ReceiveMoney::from('0240120250')          //- The phone number to send the prompt to.
        ->amount(1)                    //- The exact amount value of the transaction
        ->description('Online Purchase')    //- Description of the transaction.
        ->customerName('Ariama Victor')     //- Name of the person making the payment.
        ->callback('http://ovac4u.com/pay') //- The URL to send callback after payment.
        ->channel('mtn-gh')                 //- The mobile network Channel.
        ->injectConfig($this->config)             //- Inject the configuration
        ->run();

//        $this->payment = $payment->from('0240120250'); //- The phone number to send the prompt to.
    }

    public function pay($amount){

        $this->payment
        ->amount($amount)                    //- The exact amount value of the transaction
        ->description('Online Purchase')    //- Description of the transaction.
        ->customerName('Ariama Victor')     //- Name of the person making the payment.
        ->callback('http://ovac4u.com/pay') //- The URL to send callback after payment.
        ->setAmount('mtn-gh')                 //- The mobile network Channel.
        ->injectConfig($this->config)             //- Inject the configuration
        ->run();
    }
}