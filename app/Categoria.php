<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $tabela = 'categoria';
    protected $chavePrimaria = 'idcategoria';

    public $timestamps = false;

    protected $fillable = ['nome', 'descricao', 'condicao',];

    protected $guarded = [];
}
