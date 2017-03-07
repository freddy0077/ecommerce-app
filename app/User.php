<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','phone_number', 'email', 'password','has_store','gender','store'
    ];

    protected  $slack_webhook_url = 'https://hooks.slack.com/services/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';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function categories()
    {
        return $this->hasMany('App\ProductCategory');
    }

    public function routeNotificationForSlack()
    {
        return $this->slack_webhook_url;
    }
}
