<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformacoesEntrada extends Model {
	protected $table = 'informacoesEntradas';
	protected $primaryKey = 'id_informacoesEntrada';

	public $timestamps = false;

	protected $fillable = [
		'id_entrada_informacoesEntrada',
		'id_produto_informacoesEntrada',
		'quantidade_informacoesEntrada',
		'valor_entrada_informacoesEntrada',
		'valor_saida_informacoesEntrada'
	];

	protected $guarded = [];
}
