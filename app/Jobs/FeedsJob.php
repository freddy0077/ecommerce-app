<?php

namespace App\Jobs;

use App\Events\ChatMessageReceived;
use App\Feed;
use App\FeedReaction;
use App\Product;
use App\Store;
use App\WatchedShop;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class FeedsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable
//        SerializesModels
        ;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    protected $user_id;
    protected $message;
    protected $other;
    protected $type;
    public function __construct($user_id,$user,$message,$other="",$type="")
    {
        $this->user_id = $user_id;
        $this->message = $message;
        $this->user = $user;
        $this->other = $other;
        $this->type = $type;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->type == "reactions"){
            FeedReaction::create([
                'id' => Uuid::generate(),
                'user_id'=> $this->user_id,
                'feed_id' => $this->other,
                'comment' => $this->message
            ]);

        }else {
            \App\Feed::recordAction($this->user_id,$this->message,$this->other);
//        \App\Feed::recordAction($this->user->id,$this->message,$this->other);
        }
        event(new ChatMessageReceived($this->message,$this->user));
    }
}
