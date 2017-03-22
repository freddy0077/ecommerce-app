<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchedShop extends Model
{
    //
    protected $fillable = ['id','user_id','action','store_id'];

    protected $casts = ['id' =>'string'];
}
