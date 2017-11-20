<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MainSubCategory
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $main_category_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainSubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainSubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainSubCategory whereMainCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainSubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainSubCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainSubCategory whereUpdatedAt($value)
 */
class MainSubCategory extends Model
{
    //
}
