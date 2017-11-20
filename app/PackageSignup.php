<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\PackageSignup
 *
 * @property-read \App\PackageSignup $packages
 * @property-read \App\Store $store
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 * @mixin \Eloquent
 * @property string $id
 * @property string $package_id
 * @property int $user_id
 * @property string|null $store_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PackageSignup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PackageSignup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PackageSignup wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PackageSignup whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PackageSignup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PackageSignup whereUserId($value)
 */
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
