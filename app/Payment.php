<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = ['id','response_code','response_text','description','token','tx_status','transaction_id','mobile_invoice_no','cancel_reason','user_id','amount','package_id'];
}
