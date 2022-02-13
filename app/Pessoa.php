<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model {
    protected $table = 'pessoas';
    
    protected $primaryKey = 'idpessoa';

    public $timestamps = false;

    protected $fillable = ['tipo_pessoa', 'nome', 'tipo_documento', 'numero_documento', 'endereco', 'telefone', 'email'];

    protected $guarded = [];
}
