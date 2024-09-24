<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class NewMessageReceived implements ShouldBroadcast
{
    use SerializesModels;

    public $message;
    public $user;

    public function __construct($message, $user)
    {
        $this->message = $message;
        $this->user = $user;
    }

    public function broadcastOn()
    {
        // Private channel for specific user messages
        return new PrivateChannel('messages.' . $this->user->id);
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message->text,
            'sent_by' => $this->message->sender->name,
        ];
    }
}
