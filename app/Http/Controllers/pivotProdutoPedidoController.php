<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\pivotProdutoPedido;
use App\Models\Produto;

class pivotProdutoPedidoController extends Controller
{
    public function index($id){
        $pedido = Pedido::with('produtos')->findOrFail($id);
        $produtos = Produto::get(['id','nome','preco']);
        return view('detpedido', compact('pedido', 'produtos'));
    }

    public function attachProduto(Request $request, $id){
        dd($request);
        $pedido = Pedido::findOrFail($id);
        $request->validate([
            'id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1'
            ]);
        $produto = Produto::findOrFail($request->id);
        $quantidade = $request->quantidade;
        $subtotal = $quantidade * $produto->valor;

        $pedido->produtos()->attach($produto->id, [
            'quantidade' => $quantidade,
            'preco' => $subtotal
        ]);
        
        $pedido->valor += $subtotal;
        $pedido->save();
        
        return redirect()->route('detalhes-pedido.index', ['id'=>$id]);
    }
}
