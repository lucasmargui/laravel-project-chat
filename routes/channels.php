<?php

use Illuminate\Support\Facades\Broadcast;

use App\Models\Order;
use App\Models\Message;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Definindo um canal privado para mensagens
Broadcast::channel('messages.{id}', function ($user, $id) {
    
    return (int) $user->id === (int) $id; // Verifica se o usuário autenticado pode acessar o canal
});