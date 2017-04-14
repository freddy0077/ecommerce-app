<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedReaction extends Model
{
    //
    protected $fillable = ['id','user_id','feed_id','like','comment'];

    protected $casts = ['id'=>'string'];

    public static function feedReactionByFeedId($feed_id){
        return FeedReaction::leftJoin('users','feed_reactions.user_id','=','users.id')->
        whereFeedId($feed_id)
            ->selectRaw('feed_reactions.*,users.name as name')
            ->orderBy('created_at','desc')
            ->get();
    }
}
