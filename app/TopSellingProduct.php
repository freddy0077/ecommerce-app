<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TopSellingProduct
 *
 * @mixin \Eloquent
 * @property string $id
 * @property int $user_id
 * @property string $store_id
 * @property string $product_id
 * @property int $count
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopSellingProduct whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopSellingProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopSellingProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopSellingProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopSellingProduct whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopSellingProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopSellingProduct whereUserId($value)
 */
class TopSellingProduct extends Model
{
    //
    protected $fillable = [  'id' , 'user_id','store_id','product_id','count'];

    protected $casts = ['id' => 'string'];
}
