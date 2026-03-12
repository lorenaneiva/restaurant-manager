<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class pedidoController extends Controller
{
    public function index(){
        $pedidos = Pedido::all();
        return view('pedido', ['pedido' => $pedidos]);
    }
}
