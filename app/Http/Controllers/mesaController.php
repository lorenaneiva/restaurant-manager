<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;

class mesaController extends Controller
{
    public function index(){
        $mesas = Mesa::all();
        return view('mesa', ['mesas' => $mesas]);
    }
    
    public function store(Request $request){
        /*$request->validate([
            'numero' => 'required',
        ]);

        Mesa::create([
            'numero' => $request->numero
        ]);*/
        $quantidade = $request->quantidade;

        Mesa::truncate();

        for($i = 1; $i <= $quantidade; $i++){
            Mesa::create([
                'numero'=>$i
            ]);
        }

        return redirect('/mesas');
    }
    public function destroy($id){
        $mesa = Mesa::findOrFail($id);
        $mesa->delete();
        return redirect('/mesas');
    }
}
