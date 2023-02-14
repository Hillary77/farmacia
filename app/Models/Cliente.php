<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    protected $primaryKey = 'id';
    protected $table = 'clientes';
   
    protected $fillable = [
        'id',
        'name',
        'rg',
        'birth',
        'phone',
        'email',
        'cpf',
        'state',
        'address',
        'cep'
    ];

    
    public function relCliente() {
        return $this->hasOne(Cliente::class, 'id', 'client_id');
    }

    
}