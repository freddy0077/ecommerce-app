<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageSignup extends Model
{
    //
    protected $casts = ['id' => 'string'];

    protected $fillable = ['id','package_id','user_id'];
}
