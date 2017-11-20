<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Package
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PackageSignup[] $packageSignups
 * @mixin \Eloquent
 * @property string $id
 * @property string $name
 * @property float $charge
 * @property string $description
 * @property int $number_of_products
 * @property int $duration
 * @property string|null $payment_link
 * @property string|null $type
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereNumberOfProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePaymentLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereUpdatedAt($value)
 */
class Package extends Model
{
    //
    protected $casts = ['id' => 'string'];

    protected $fillable = ['id','name','charge','description','number_of_products','duration','payment_link','type'];

    public function packageSignups(){
        return $this->hasMany(PackageSignup::class);
    }

    public static function getUserPackage($user_id){
        $package = PackageSignup::whereUserId($user_id)->first();
        if($package){
            return PackageSignup::whereUserId($user_id)->first()->package_id;
        }
    }
}
