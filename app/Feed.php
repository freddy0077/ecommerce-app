<?php

namespace App;

use App\Jobs\FeedsJob;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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

    public static function sendFeedToJob($product,$type){
        $user = Auth::user();
        switch($type){
            case"fancy":
                 $message = "$user->name just fancy'd your product($product->name)";
                 dispatch(new FeedsJob($product->user_id,$user,$message));
                 break;

            case"unfancy":
                 $message = "$user->name just unfancy'd your product($product->name)";
                 dispatch(new FeedsJob($product->user_id,$user,$message));
                break;

            case"like":
                $message = "$user->name just liked your product($product->name)";
                dispatch(new FeedsJob($product->user_id,$user,$message));

                break;
            case"unlike":
                $message = "$user->name just unliked your product($product->name)";
                dispatch(new FeedsJob($product->user_id,$user,$message));
                break;
            case"follow":
                $message = "you are now following $product->name";
                dispatch(new FeedsJob($user->id,$user,$message));
                break;
            case"unfollow":
                $message = "you just unfollowed $product->name";
                dispatch(new FeedsJob($user->id,$user,$message));
                break;
        }
    }
}
