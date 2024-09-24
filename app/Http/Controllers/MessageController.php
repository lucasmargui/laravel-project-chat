<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMessageReceived;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        // Creating a message (simplified example)
        $message = Message::create([
            'text' => $request->text,
            'sender_id' => auth()->id(),
            'recipient_id' => $request->recipient_id,
        ]);

        // Trigger event to send real-time notification
        event(new NewMessageReceived($message, $message->recipient));

        return response()->json(['success' => 'Message sent successfully!']);
    }
}
