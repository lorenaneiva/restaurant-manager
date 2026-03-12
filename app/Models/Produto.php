<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
class Produto extends Model
{
    protected $fillable = ['nome', 'preco', 'descricao', 'quantidade', 'categoria'];
    public function pedidos() {
        return $this->belongsToMany(Pedido::class)->withPivot('quantidade','preco')->withTimestamps();
    }
}
