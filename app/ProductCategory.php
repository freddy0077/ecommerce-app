<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends Model
{
    //
    use Sluggable;

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [ 'id', 'user_id', 'name','image','slug'];

    public function products()
    {
        return $this->hasMany('App\Product');
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