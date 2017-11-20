<?php

namespace App;

use GetStream\StreamLaravel\Eloquent\ActivityTrait;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * App\Product
 *
 * @property-read \App\ProductCategory $category
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @mixin \Eloquent
 * @property string $id
 * @property string $store_id
 * @property int $user_id
 * @property string $name
 * @property string|null $slug
 * @property string $description
 * @property float $price
 * @property string|null $image
 * @property string $sub_category_id
 * @property int $feature
 * @property int $published
 * @property int $show_buy_button
 * @property int $ad
 * @property int $sale
 * @property float|null $sale_price
 * @property int $enable
 * @property int $like_counts
 * @property int $view_counts
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $main_category_id
 * @property string|null $main_sub_category_id
 * @property int $delivery
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereFeature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereLikeCounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereMainCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereMainSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereShowBuyButton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereViewCounts($value)
 */
class Product extends Model
{

    //
    use Sluggable;
//        ActivityTrait

 protected $fillable = ['id','store_id','name', 'product','slug','description','price','image','user_id','view_counts',
                       'sub_category_id','feature','published', 'show_buy_button', 'ad', 'like_counts','sale','sale_price'];

    protected $casts = [
        'id' => 'string'
    ];

    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getProductName($id){
       return static::find($id);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function queryByOrder($order){
     return \Illuminate\Support\Facades\Request::query('order') == "$order" ? "/store/all-products":"/store/all-products?order=$order";
}

    public static function processImage($image,$image_name){

            $destinationPath = public_path('images/products');
            $img = Image::make($image->getRealPath());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);

//           Storage::disk('s3')->put("/products/$image_name", $img->getEncoded());
           Storage::disk('public')->put("/products/$image_name", $img->getEncoded());

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
    }
}
