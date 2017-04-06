<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MarketplaceSignup extends Model
{
    use Notifiable;
    //

    protected $slack_webhook_url = "https://hooks.slack.com/services/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";

    public function routeNotificationForSlack(){
        return $this->slack_webhook_url;
    }

}
