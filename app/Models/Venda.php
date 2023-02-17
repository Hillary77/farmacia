<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model {

    protected $primaryKey = 'code';
    protected $table = 'vendas';
    protected $fillable = [
        'id',
        'code',
        'client_id',
        'product_id',
        'quantity',
        'valor',
        'total_un',
        'created_at',
        'updated_at'
    ];

    public function relCliente() {
        return $this->hasOne(Cliente::class, 'id', 'client_id');
    }

    public function relProduto() {
        return $this->hasOne(Produto::class, 'id', 'product_id');
    }

}
