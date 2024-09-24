<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderCreated;
use App\Models\Pedido;

class OrderController extends Controller
{

    // Exibir o formulário para criar um novo pedido
    public function create()
    {
        return view('orders.create'); // Exibe a view com o formulário
    }
    
    public function store(Request $request)
    {


        $order = (object)[
            'id' => '1',
            'name' => 'Name',
            'price' => 'Price',
        ];

        // Dispara o evento de pedido criado
        event(new OrderCreated($order));

        return response()->json(['message' => 'Pedido criado e evento transmitido!', 'success' => true]);
    }
}
