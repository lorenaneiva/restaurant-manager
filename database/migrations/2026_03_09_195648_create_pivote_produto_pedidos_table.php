<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pivote_produto_pedidos', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idProduto');
            $table->unsignedBigInteger('idPedido');
            $table->foreign('idProduto')->references('id')->on('produtos');
            $table->foreign('idPedido')->references('id')->on('pedidos');
            $table->integer('quantidade');
            $table->decimal('preco', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivote_produto_pedidos');
    }
};
