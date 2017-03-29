<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    protected $casts = ['id' => 'string'];

    protected $fillable = ['id','name','charge','description','number_of_products','duration','payment_link','type'];
}
