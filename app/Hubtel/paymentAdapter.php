<?php
namespace app\Hubtel;

/**
 * Created by IntelliJ IDEA.
 * User: Freddy
 * Date: 11/6/2017
 * Time: 10:05 PM
 */

interface paymentAdapter{
    public function pay($amount);
}