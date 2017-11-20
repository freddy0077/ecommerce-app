<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MainCategory
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $image
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainCategory whereUpdatedAt($value)
 */
class MainCategory extends Model
{
    //
}
