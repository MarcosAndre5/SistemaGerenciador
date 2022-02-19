<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model {
    protected $table = 'fornecedores';
    
    protected $primaryKey = 'id_fornecedor';

    public $timestamps = false;

    protected $fillable = [
        'tipo_fornecedor',
        'nome_fornecedor',
        'documento_fornecedor',
        'numero_documento_fornecedor',
        'endereco_fornecedor',
        'telefone_fornecedor',
        'email_fornecedor'
    ];

    protected $guarded = [];
}
