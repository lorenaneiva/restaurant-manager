<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produto extends Model
{
    protected $fillable = ['nome','preco', 'descricao', 'quantidade', 'categoria'];
    public function pedidos() : BelongsToMany {
        return $this->belongsToMany(Pedido::class)->withPivot('quantidade','preco');
    }
}
