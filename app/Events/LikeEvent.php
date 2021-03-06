<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Event;

class LikeEvent extends Event implements ShouldBroadcast,ShouldQueue
{
    use Dispatchable, InteractsWithSockets
//        ,
//        SerializesModels
        ;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $chatMessage;
    public $user;

    public function __construct($chatMessage,$user)
    {
        $this->chatMessage = $chatMessage;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['like-channel'];
    }
}
