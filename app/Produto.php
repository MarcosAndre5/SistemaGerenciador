<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {
	protected $table = 'produtos';
	protected $primaryKey = 'id_produto';

	public $timestamps = false;

	protected $fillable = [
		'id_categoria_produto',
		'codigo_produto',
		'nome_produto',
		'estoque_produto',
		'descricao_produto',
		'imagem_produto',
		'estado_produto'
	];

	protected $guarded = [];
}
