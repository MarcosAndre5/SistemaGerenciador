<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model {
    protected $table = 'saidas';
	protected $primaryKey = 'id_saida';

	public $timestamps = false;

	protected $fillable = [
		'id_cliente_saida',
		'tipo_comprovante_saida',
		'serie_comprovante_saida',
		'numero_comprovante_saida',
		'data_hora_saida',
        'total_saida',
		'taxa_saida',
		'estado_saida'
	];

	protected $guarded = [];
}
