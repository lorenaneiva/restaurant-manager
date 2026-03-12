<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Pedido extends Model
{

    public function produtos() {
    return $this->belongsToMany(Produto::class)->withPivot('quantidade','preco')->withTimestamps();
    }
}
