<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * App\Order
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderItem[] $items
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\User $user
 * @mixin \Eloquent
 * @property string $id
 * @property float $amount
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUserId($value)
 */
class Order extends Model
{
    use Notifiable;

    //
    protected $fillable = ['id','amount','user_id'];

    protected $casts = ['id' => 'string'];

    protected  $slack_webhook_url = 'https://hooks.slack.com/services/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';


    public function items(){

        return $this->hasMany('App\OrderItem');

    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function routeNotificationForSlack(){
        return $this->slack_webhook_url;
    }


}
