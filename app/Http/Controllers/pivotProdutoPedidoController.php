<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;

class pivotProdutoPedidoController extends Controller
{
    public function index($id){
        $pedido = Pedido::with('produtos')->findOrFail($id);
        $produtos = Produto::all();
        
        return view('detalhespedido', compact('pedido', 'produtos'));
    }

    public function attachProduto(Request $request, $id){
        $pedido = Pedido::findOrFail($id);
        $request->validate([
            'idProduto' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1'
            ]);
        $produto = Produto::findOrFail($request->id);
        $quantidade = $request->quantidade;
        $subtotal = $quantidade * $produto->valor;

        $pedido->produtos()->attach($produto->id, [
            'quantidade' => $quantidade
        ]);
        
        $pedido->valor += $subtotal;
        $pedido->save();
        
        return redirect()->back();
    }
}
