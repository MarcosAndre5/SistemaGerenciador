<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model {
    protected $table = 'entradas';
    protected $primaryKey = 'id_entrada';

    public $timestamps = false;

    protected $fillable = [
        'id_fornecedor_entrada',
        'tipo_comprovante_entrada',
        'serie_comprovante_entrada',
        'numero_comprovante_entrada',
        'data_hora_entrada',
        'taxa_entrada',
        'estado_entrada'
    ];

    protected $guarded = [];
}
