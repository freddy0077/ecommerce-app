<?php

namespace App;

use GetStream\StreamLaravel\Eloquent\ActivityTrait;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
       return Product::find($id);
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
//            })->save($destinationPath.'/'.$input['imagename']);
            })->save($destinationPath.'/'.$image_name);

           Storage::disk('s3')->put("/products/$image_name", $img->getEncoded());

            $destinationPath = public_path('/images');
//            $image->move($destinationPath, $input['imagename']);
            $image->move($destinationPath, $image_name);
//        }
    }
}
