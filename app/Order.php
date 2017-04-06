<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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
