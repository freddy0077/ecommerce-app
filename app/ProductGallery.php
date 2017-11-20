<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProductGallery
 *
 * @mixin \Eloquent
 * @property string $id
 * @property string $product_id
 * @property string $image
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductGallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductGallery whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductGallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductGallery whereUserId($value)
 */
class ProductGallery extends Model
{
    //
    protected $casts = ['id' => 'string'];

    protected $fillable = ['id','product_id','image','user_id'];
}
