<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['id','amount','user_id'];

    protected $casts = ['id' => 'string'];

    public function items(){

        return $this->hasMany('App\OrderItem');

    }

    public function user(){
        return $this->belongsTo('App\User');
    }



}
