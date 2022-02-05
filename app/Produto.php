<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {
    protected $table = 'produtos';
    
    protected $primaryKey = 'idproduto';

    public $timestamps = false;

    protected $fillable = ['idcategoria', 'estoque', 'codigo', 'nome', 'descricao', 'imagem', 'estado'];

    protected $guarded = [];
}
