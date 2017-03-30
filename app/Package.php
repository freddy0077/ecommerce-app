<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    protected $casts = ['id' => 'string'];

    protected $fillable = ['id','name','charge','description','number_of_products','duration','payment_link','type'];

    public function packageSignups(){
        return $this->hasMany(PackageSignup::class);
    }

    public static function getUserPackage($user_id){
        return PackageSignup::whereUserId($user_id)->first()->package_id;
    }
}
