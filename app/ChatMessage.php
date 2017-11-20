<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ChatMessage
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $message
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ChatMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ChatMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ChatMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ChatMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ChatMessage whereUserId($value)
 */
class ChatMessage extends Model
{
    //
    public $fillable = ['user_id','message'];
}

