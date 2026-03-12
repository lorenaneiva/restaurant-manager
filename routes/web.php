<?php

use App\Http\Controllers\mesaController;
use App\Http\Controllers\pedidoController;
use App\Http\Controllers\pivotProdutoPedidoController;
use App\Http\Controllers\produtoController;
use App\Models\Mesa;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/mesas', [mesaController::class, 'index'])->name('mesa.index');
Route::post('/mesas', [mesaController::class, 'store'])->name('mesa.store');

Route::get('/pedidos', [pedidoController::class, 'index'])->name('pedido.index');
Route::post('/pedidos', [pedidoController::class, 'store'])->name('pedido.store');
Route::delete('/pedidos/{id}', [pedidoController::class, 'destroy'])->name('pedido.destroy');

Route::get('/detalhes-pedido/{id}', [pivotProdutoPedidoController::class, 'index'])->name('detalhes-pedido.index');
Route::post('/detalhes-pedido/{id}/attach', [pivotProdutoPedidoController::class, 'attachProduto'])->name('detalhes-pedido.attachProduto');
Route::post('/detalhes-pedido/{id}/detach', [pivotProdutoPedidoController::class, 'detachProduto'])->name('detalhes-pedido.detachProduto');

Route::get('/produtos', [produtoController::class, 'index'])->name('produto.index');
Route::post('/produtos', [produtoController::class, 'store'])->name('produto.store');
Route::delete('/produtos/{id}', [produtoController::class, 'destroy'])->name('produto.destroy');