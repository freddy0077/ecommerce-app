<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;

/**
 * App\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductCategory[] $categories
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Order $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PackageSignup[] $packageSignups
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string|null $phone_number
 * @property string|null $email
 * @property string|null $password
 * @property string|null $gender
 * @property int $has_store
 * @property int $admin
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereHasStore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
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

    public $incrementing = false;

    protected  $slack_webhook_url;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->slack_webhook_url = 'https://hooks.slack.com/services/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';
    }

    /**
     * User constructor.
     */

    public function categories()
    {
        return $this->hasMany('App\ProductCategory');
    }

    public function routeNotificationForSlack()
    {
//        return $this->slack_webhook_url;
        return env('SLACK_API_URL');
    }

    public function order(){
        return $this->hasOne('App\Order');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function store(){
        $this->hasOne('App\Store');
    }

    public function packageSignups(){
        return $this->hasMany(PackageSignup::class);
    }

    public static function getNameById($id){
       return static::find($id)->name;
    }
}
