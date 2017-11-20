<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FeedReaction
 *
 * @mixin \Eloquent
 * @property string $id
 * @property int $user_id
 * @property string $feed_id
 * @property int $like
 * @property string|null $comment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedReaction whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedReaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedReaction whereFeedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedReaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedReaction whereLike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedReaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FeedReaction whereUserId($value)
 */
class FeedReaction extends Model
{
    //
    protected $fillable = ['id','user_id','feed_id','like','comment'];

    protected $casts = ['id'=>'string'];

    public static function feedReactionByFeedId($feed_id){
        return static::leftJoin('users','feed_reactions.user_id','=','users.id')->
        whereFeedId($feed_id)
            ->selectRaw('feed_reactions.*,users.name as name')
            ->orderBy('created_at','desc')
            ->get();
    }
}
