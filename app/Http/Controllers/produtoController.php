<?php

namespace App\Http\Controllers;

use App\Http\Requests\produtoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class produtoController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        $categorias = ['entrada','comida','sobremesa','bebida'];
        return view('produto', compact('categorias', 'produtos'));
    }

    public function store(produtoRequest $request){
        $validated = $request->validated();

        try {
            $produto = new Produto();
            $produto->nome = $validated['nome'];
            $produto->preco = $validated['preco'];
            $produto->descricao = $validated['descricao'];
            $produto->categoria = $validated['categoria'];
            $produto->save();
        } catch (\Illuminate\Database\QueryException $e){
            return back()->withErrors(['msg' => 'Já existe um produto com esse nome.']);
        }

        return redirect('/produtos');
    }

    public function destroy($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect('/produtos');
    }
}
