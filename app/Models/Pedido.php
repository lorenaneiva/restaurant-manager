<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    protected $fillable = ['nome_cliente', 'idMesa', 'valor', 'pedido_aberto', 'pedido_fechado'];
    protected $casts = [
        'pedido_aberto' =>'datetime',
        'pedido_fechado' => 'datetime'
    ];
    public function produtos() : BelongsToMany {
        return $this->belongsToMany(Produto::class);
    }
}
