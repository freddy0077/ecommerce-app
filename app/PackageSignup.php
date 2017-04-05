<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PackageSignup extends Model
{
    //
    protected $casts = ['id' => 'string'];

    protected $fillable = ['id','package_id','user_id','store_id'];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function packages(){
        return $this->belongsTo(PackageSignup::class);
    }

    public static function getUserPackageThreshold(){
        $user_id = Auth::user()->id;



           $package_signup = PackageSignup::leftJoin('packages','packages.id','=','package_signups.package_id')
            ->whereUserId($user_id)
            ->first();

               if($package_signup){
                return $package_signup->number_of_products;
               }else {
                   return 50;
               }
    }
}
