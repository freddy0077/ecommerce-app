<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * App\MarketplaceSignup
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $package_id
 * @property int $user_id
 * @property string $store_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketplaceSignup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketplaceSignup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketplaceSignup wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketplaceSignup whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketplaceSignup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketplaceSignup whereUserId($value)
 */
class MarketplaceSignup extends Model
{
    use Notifiable;
    //

    protected $slack_webhook_url = "https://hooks.slack.com/services/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";

    public function routeNotificationForSlack(){
        return $this->slack_webhook_url;
    }

}
