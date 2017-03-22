<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    //
    protected $fillable = ['id','user_id','action','other'];
}
