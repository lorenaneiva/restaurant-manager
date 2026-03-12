<?php

namespace App\Http\Controllers;

use App\Http\Requests\pedidoRequest;
use App\Models\Pedido;
use Illuminate\Http\Request;

class pedidoController extends Controller
{
    public function index(){
        $pedidos = Pedido::all();
        return view('pedido', compact('pedidos'));
    }
    public function store(pedidoRequest $request){
        $validated = $request->validated();

        $id = null;
        try{ 
            $pedido = new Pedido();
            $pedido->nome_cliente = $validated['nome_cliente'];
            $pedido->idMesa = $validated['idMesa'];
            $pedido->valor = 0;
            $pedido->pedido_aberto = now();
            $pedido->save();
            $id = $pedido->id;
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors(['msg' => 'Já existe um pedido aberto para este cliente e mesa.']);
        }

        return redirect()->route('detalhes-pedido.index', ['id' => $id]);
    }
    public function destroy($id){
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        return redirect()->back();
    }
}
