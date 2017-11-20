<?php
/**
 * Created by IntelliJ IDEA.
 * User: Freddy
 * Date: 11/20/2017
 * Time: 1:08 PM
 */

namespace App\Sms;


class KodeSmsAdapter implements smsAdapter
{
    private $kodesms;

    public function __construct(KodeSms $kodeSms)
    {
        $this->kodesms = $kodeSms;
    }

    public function sendSms($message, $phone_number)
    {
        // send sms
       return $this->kodesms->sendSms($message,$phone_number);
    }
}