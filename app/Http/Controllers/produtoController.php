<?php

namespace App\Http\Controllers;

use App\Https\Requests\produtoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class produtoController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        $categorias = ['entrada','comida','sobremesa','bebida'];
        return view('produto', compact('categorias', 'produtos'));
    }

    public function store(Request $request){
        $validated = $request->validated();
        $produto = new Produto();
        $produto->nome = $validated.trim(mb_strtolower('[nome]'));
        $produto->preco = $validated['preco'];
        $produto->descricao = $validated.trim(['descricao']);
        $produto->categoria = $validated['categoria'];
        $produto->save;

        return redirect('/produtos');
    }

    public function destroy($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect('/produtos');
    }
}
