<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\WatchedShop
 *
 * @mixin \Eloquent
 * @property string $id
 * @property string $store_id
 * @property int $user_id
 * @property string $action
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WatchedShop whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WatchedShop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WatchedShop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WatchedShop whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WatchedShop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WatchedShop whereUserId($value)
 */
class WatchedShop extends Model
{
    //
    protected $fillable = ['id','user_id','action','store_id'];

    protected $casts = ['id' =>'string'];

    public static function getProductLikeStatus($product_id){


    }
}
