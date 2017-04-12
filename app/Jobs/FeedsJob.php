<?php

namespace App\Jobs;

use App\Events\ChatMessageReceived;
use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Artisan;

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
    public function __construct($user_id,$user,$message)
    {
        $this->user_id = $user_id;
        $this->message = $message;
        $this->user = $user;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \App\Feed::recordAction($this->user_id,$this->message);
        event(new ChatMessageReceived($this->message,$this->user));
    }
}
