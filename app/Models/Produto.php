<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {

    protected $primaryKey = 'id';
    protected $table = 'produtos';
    protected $fillable = [
        'id',
        'name_product',
        'description',
        'valor',
        'stock',
        'image',
        'created_at',
        'updated_at'
    ];

    public function relProduto() {
        return $this->hasOne(Produto::class, 'id', 'product_id');
    }

}
