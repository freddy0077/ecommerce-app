<?php
/**
 * Created by IntelliJ IDEA.
 * User: Freddy
 * Date: 11/20/2017
 * Time: 1:00 PM
 */

namespace App\Sms;

interface smsAdapter{
    public function sendSms($message, $phone_number);
}