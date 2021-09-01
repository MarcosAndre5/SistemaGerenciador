<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model {
    protected $fillable = ['titulo', 'descricao', 'imagem',];

    protected $hidden = [];
}
