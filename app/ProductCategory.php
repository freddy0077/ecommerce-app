<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * App\ProductCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCategory[] $subcategories
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @mixin \Eloquent
 * @property string $id
 * @property int $user_id
 * @property string $name
 * @property string|null $slug
 * @property string|null $image
 * @property int $enable
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereUserId($value)
 */
class ProductCategory extends Model
{
    //
    use Sluggable;

    protected $casts = [
        'id' => 'string'
    ];

    protected $table = 'product_categories';

    protected $fillable = [ 'id', 'user_id', 'name','image','slug','enable'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function subcategories(){
        return $this->hasMany(SubCategory::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
