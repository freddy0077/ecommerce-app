<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

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

//    public function store(){
//        $this->belongsTo('App\Store');
//
//    }



    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
