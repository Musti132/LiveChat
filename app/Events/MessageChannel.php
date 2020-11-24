<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageChannel implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sent_at;
    public $from_id;
    public $from_user;
    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($resource)
    {
        $this->message = $resource['message'];
        $this->from_id = $resource['user_id'];
        $this->from_user = $resource['from_user']->name;
        $this->sent_at = $resource['created_at'];
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('message.received');
    }
}
