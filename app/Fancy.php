<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fancy extends Model
{
    protected $fillable = ['id','product_id','user_id'];
}
