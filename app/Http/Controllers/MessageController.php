<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMessageReceived;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{

    
    public function index()
    {

        $users = User::all();

        return view('messages.index', compact('users')); 
    }


    public function showChat(Request $request)
    {
        // ID do destinatário selecionado
        $recipientId = $request->input('recipient_id');

        // Verificar se o destinatário existe
        $recipient = User::find($recipientId);
        if (!$recipient) {
            return response()->json(['error' => 'Recipient not found.'], 404);
        }

        // Obter o usuário autenticado
        $senderId = Auth::id();

        // Buscar as mensagens entre o usuário autenticado e o destinatário
        $messages = Message::where(function ($query) use ($senderId, $recipientId) {
            $query->where('sender_id', $senderId)
                  ->where('recipient_id', $recipientId);
        })->orWhere(function ($query) use ($senderId, $recipientId) {
            $query->where('sender_id', $recipientId)
                  ->where('recipient_id', $senderId);
        })->orderBy('created_at', 'asc')->get();

        // Retornar os dados como JSON
        return response()->json([
            'messages' => $messages,
            'recipient_name' => $recipient->name,
        ]);
    }


        
    public function store(Request $request)
    {
   
        // Criar nova mensagem
        $message = Message::create([
            'text' => $request->input('text'),
            'sender_id' => Auth::id(),
            'recipient_id' => $request->input('recipient_id'),
        ]);

               // Trigger event to send real-time notification
        event(new NewMessageReceived($message, $message->recipient));

        // Retornar a nova mensagem como JSON
        return response()->json([
            'message' => $message
        ]);
    }

}
