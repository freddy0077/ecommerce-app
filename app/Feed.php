<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Feed extends Model
{
    //
    protected $fillable = ['id','user_id','action','other'];

    public static function recordAction($user_id,$action){
        Feed::create([
            'id' => Uuid::generate(),
            'user_id' => $user_id,
            'action' => $action
        ]);
    }
}
