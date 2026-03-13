<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pivotProdutoPedido extends Model
{
    protected $fillable = [
        'produto_id', 
        'pedido_id',
        'quantidade',
        'preco'
    ];


}
