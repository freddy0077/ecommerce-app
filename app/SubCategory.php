<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


/**
 * App\SubCategory
 *
 * @property-read \App\ProductCategory $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @mixin \Eloquent
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $product_category_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereUpdatedAt($value)
 */
class SubCategory extends Model
{
    //

    use Sluggable;

    protected $casts = ['id' => 'string'];

    protected $fillable = ['id','name','product_category_id','slug'];

    public function subCategory(){
        return $this->belongsTo(ProductCategory::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


}
