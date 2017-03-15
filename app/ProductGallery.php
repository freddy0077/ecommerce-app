<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    //
    protected $casts = ['id' => 'string'];

    protected $fillable = ['id','product_id','image','user_id'];
}
