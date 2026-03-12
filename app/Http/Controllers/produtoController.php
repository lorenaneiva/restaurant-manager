<?php

namespace App\Http\Controllers;

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
        $request->validate([
            'nome' => 'required|min:3',
            'preco' => 'required|decimal:0|min:0.01' ,
            'descricao' => 'nullable|max:500',
            'categoria' => 'required'
        ]);

        Produto::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'descricao' => $request->descricao,
            'categoria' => $request->categoria,
        ]);

        return redirect('/produtos');
    }
}
