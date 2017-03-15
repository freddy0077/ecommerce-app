<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class Product extends Model
{
    //
    use Sluggable;

 protected $fillable = ['id','store_id','name', 'product','slug','description','price','image',
                       'sub_category_id','feature','published', 'show_buy_button', 'ad', 'like_counts'];

    protected $casts = [
        'id' => 'string'
    ];

    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }

    public function user(){
        return $this->belongsTo('App\User');
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

    public static function processImage($image,$image_name){
//        $date_time = date('Ymdhis');

//        if($request->hasFile($image_name)){
//            $image = $request->file($image_name);
//            $input['imagename'] = $product_id.$date_time.'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('images/products');
            $img = Image::make($image->getRealPath());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
//            })->save($destinationPath.'/'.$input['imagename']);
            })->save($destinationPath.'/'.$image_name);

            $destinationPath = public_path('/images');
//            $image->move($destinationPath, $input['imagename']);
            $image->move($destinationPath, $image_name);

//        }
    }
}
