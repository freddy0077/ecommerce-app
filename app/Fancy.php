<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Fancy
 *
 * @mixin \Eloquent
 * @property string $id
 * @property string $product_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fancy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fancy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fancy whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fancy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fancy whereUserId($value)
 */
class Fancy extends Model
{
    protected $fillable = ['id','product_id','user_id'];

    protected $casts = ['id' => 'string'];
}
