<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;


class Store extends Model
{
    use Sluggable;

    protected $fillable = ['id','user_id', 'name', 'email', 'phone_number' ,'address', 'domain', 'city','business_type','about'];
    //

    protected $casts = ['id' =>'string'];

    public function productCategory(){
        $this->belongsTo('App\ProductCategory');
    }

//    public function storeProducts(){
//        $this->hasMany('App\Product');
//    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function getProductsByCategory($category_id){
       return Product::leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
            ->leftJoin('product_categories','product_categories.id','=','sub_categories.id')
            ->leftJoin('stores','stores.id','products.store_id')
            ->where('sub_categories.id',$category_id)
//            ->where('product_categories.user_id',Auth::user()->id)
            ->selectRaw('products.*')
            ->get();
    }
}


