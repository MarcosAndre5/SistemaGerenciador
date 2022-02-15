<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    protected $table = 'clientes';
    
    protected $primaryKey = 'id_cliente';

    public $timestamps = false;

    protected $fillable = [
        'tipo_cliente',
        'nome_cliente',
        'documento_cliente',
        'numero_documento_cliente',
        'endereco_cliente',
        'telefone_cliente',
        'email_cliente'
    ];

    protected $guarded = [];
}
