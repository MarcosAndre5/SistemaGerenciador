<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformacoesSaida extends Model {
    protected $table = 'informacoesSaida';
	protected $primaryKey = 'id_informacoesSaida';

	public $timestamps = false;

	protected $fillable = [
		'id_saida_informacoesSaida',
		'id_produto_informacoesSaida',
		'quantidade_informacoesSaida',
		'valor_saida_informacoesSaida',
        'desconto_informacoesSaida',
	];

	protected $guarded = [];
}
