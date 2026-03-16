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
        $quantidade = $request->quantidade;

        for($i = 1; $i <= $quantidade; $i++){
            Mesa::create();
        }

        return redirect('/mesas');
    }
    public function destroy($id){
        $mesa = Mesa::findOrFail($id);
        $mesa->delete();
        return redirect('/mesas');
    }
}
