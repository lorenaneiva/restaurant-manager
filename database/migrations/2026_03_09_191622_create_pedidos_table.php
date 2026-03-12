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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idMesa');
            $table->string('nome_cliente', 30)->nullable();
            $table->foreign('idMesa')->references('id')->on('mesas');
            $table->decimal('valor', 8, 2);
            $table->dateTime('pedido_aberto');
            $table->dateTime('pedido_fechado')->nullable();
            $table->boolean('aberto')->default(true);
            $table->unique(['nome_cliente','idMesa', 'aberto']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
