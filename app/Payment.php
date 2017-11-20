<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Payment
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $response_code
 * @property string $response_text
 * @property string $description
 * @property string|null $tx_status
 * @property string $transaction_id
 * @property string|null $token
 * @property string $mobile_invoice_no
 * @property string|null $cancel_reason
 * @property float $amount
 * @property string $package_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereCancelReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereMobileInvoiceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereResponseCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereResponseText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereTxStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUserId($value)
 */
class Payment extends Model
{
    //
    protected $fillable = ['id','response_code','response_text','description','token','tx_status','transaction_id','mobile_invoice_no','cancel_reason','user_id','amount','package_id'];
}
