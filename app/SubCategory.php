<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


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
