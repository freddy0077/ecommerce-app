<?php

namespace App;

use GetStream\StreamLaravel\Eloquent\ActivityTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class Store extends Model
{
    use Sluggable;
    use Notifiable;

    protected $fillable = ['id','user_id', 'name', 'email', 'phone_number' ,'address', 'domain',
        'city','business_type','about','colour','banner-image'];
    //

    protected $casts = ['id' =>'string'];

    protected $slack_hook_url = "https://hooks.slack.com/services/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";

    public function productCategory(){
        $this->belongsTo('App\ProductCategory');
    }

    public function user(){
        $this->belongsTo('App\User');
    }

    public function packageSignups(){
        return $this->hasMany(Store::class);
    }



    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function routeNotificationForSlack(){
        return $this->slack_hook_url;
    }

    public static function getProductsByCategory($category_id,$user_id){
       return Product::leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
            ->leftJoin('product_categories','product_categories.id','=','sub_categories.id')
            ->leftJoin('stores','stores.id','products.store_id')
            ->where('sub_categories.id',$category_id)
            ->where('product_categories.user_id',$user_id)
            ->selectRaw('products.*')
            ->get();
    }
}


