<?php

namespace App;

use App\Jobs\FeedsJob;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

/**
 * App\Feed
 *
 * @mixin \Eloquent
 * @property string $id
 * @property int $user_id
 * @property string $action
 * @property string|null $other
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $store_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereUserId($value)
 */
class Feed extends Model
{
    //
    protected $fillable = ['id','user_id','action','other','store_id'];

    protected $casts = ['id' => 'string'];

    public static function recordAction($user_id,$action,$other="",$store_id){
        Feed::create([
            'id' => Uuid::generate(),
            'user_id' => $user_id,
            'action' => $action,
            'other' => $other,
            'store_id' => $store_id
        ]);
    }

    public static function sendFeedToJob($product,$type,$other=""){
        $user = Auth::user();
        $store_id = Auth::user()->has_store ? Store::whereUserId($user->id)->first()->id : null;
        switch($type){
            case"fancy":
                 $message = "$user->name just fancy'd your product($product->name)";
                 dispatch(new FeedsJob($product->user_id,$user,$message,"","",$store_id));
                 break;

            case"unfancy":
                 $message = "$user->name just unfancy'd your product($product->name)";
                 dispatch(new FeedsJob($product->user_id,$user,$message,"","",$store_id));
                 break;
            case"like":
                $message = "$user->name just liked your product($product->name)";
                dispatch(new FeedsJob($product->user_id,$user,$message,$other,"",$store_id));
                break;
            case"unlike":
                $message = "$user->name just unliked your product($product->name)";
                dispatch(new FeedsJob($product->user_id,$user,$message,"","",$store_id));
                break;
            case"follow":
                $message = "you are now following $product->name";
                dispatch(new FeedsJob($user->id,$user,$message,"","",$store_id));
                break;
            case"unfollow":
                $message = "you just unfollowed $product->name";
                dispatch(new FeedsJob($user->id,$user,$message,"","",$store_id));
                break;
            case"timeline":
                $message = $product;
                dispatch(new FeedsJob($user->id,$user,$message,$other,"",$store_id));
                break;
        }
    }

//    public static function sendUserFeedToJob($product,$type,$other=""){
//        $user = Auth::user();
//        switch($type){
//            case"fancy":
//                 $message = "$user->name just fancy'd your product($product->name)";
//                 dispatch(new FeedsJob($product->user_id,$user,$message));
//                 break;
//
//            case"unfancy":
//                 $message = "$user->name just unfancy'd your product($product->name)";
//                 dispatch(new FeedsJob($product->user_id,$user,$message));
//                break;
//
//            case"like":
//                $message = "$user->name just liked your product($product->name)";
//                dispatch(new FeedsJob($product->user_id,$user,$message,$other));
//
//                break;
//            case"unlike":
//                $message = "$user->name just unliked your product($product->name)";
//                dispatch(new FeedsJob($product->user_id,$user,$message));
//                break;
//            case"follow":
//                $message = "you are now following $product->name";
//                dispatch(new FeedsJob($user->id,$user,$message));
//                break;
//            case"unfollow":
//                $message = "you just unfollowed $product->name";
//                dispatch(new FeedsJob($user->id,$user,$message));
//                break;
//            case"timeline":
//                $message = $product;
//                dispatch(new FeedsJob($user->id,$user,$message,$other));
//                break;
//
//        }
//    }
}
