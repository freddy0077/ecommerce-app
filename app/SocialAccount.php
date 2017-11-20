<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SocialAccount
 *
 * @property-read \App\User $user
 * @mixin \Eloquent
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialAccount whereUserId($value)
 */
class SocialAccount extends Model
{
    //
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
