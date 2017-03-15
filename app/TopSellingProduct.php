<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopSellingProduct extends Model
{
    //
    protected $fillable = [  'id' , 'user_id','store_id','product_id','count'];

    protected $casts = ['id' => 'string'];
}
