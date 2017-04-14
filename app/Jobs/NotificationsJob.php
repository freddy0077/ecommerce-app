<?php

namespace App\Jobs;

use App\Notifications\NewShop;
use App\Notifications\NewSignUp;
use App\Store;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Notification;

class NotificationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $object;
    protected $type;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$type)
    {
        $this->object=$user;
        $this->type=$type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch($this->type){
            case"signup":
                Notification::send(User::first(), new NewSignUp($this->object));
                break;
            case"newShop":
                Notification::send(Store::first(), new NewShop($this->object));
                break;
        }


    }
}
