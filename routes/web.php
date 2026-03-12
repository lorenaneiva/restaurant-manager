<?php

use App\Http\Controllers\mesaController;
use App\Http\Controllers\pedidoController;
use App\Http\Controllers\produtoController;
use App\Models\Mesa;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/mesas', [mesaController::class, 'index'])->name('mesa.index');
Route::post('/mesas', [mesaController::class, 'store'])->name('mesa.store');
Route::delete('mesas/{id}', [mesaController::class, 'destroy'])->name('mesa.destroy');

Route::get('/pedidos', [pedidoController::class, 'index'])->name('pedido.index');

Route::get('/produtos', [produtoController::class, 'index'])->name('produto.index');
Route::post('/produtos', [produtoController::class, 'store'])->name('produto.store');