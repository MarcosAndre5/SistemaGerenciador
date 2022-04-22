<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {
	protected $table = 'categorias';
	protected $primaryKey = 'id_categoria';

	public $timestamps = false;

	protected $fillable = [
		'nome_categoria',
		'descricao_categoria',
		'estado_categoria'
	];

	protected $guarded = [];
}
