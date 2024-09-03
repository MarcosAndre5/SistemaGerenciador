<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model {
    protected $table = 'cargos';
	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable = ['descricao'];

	protected $guarded = [];
}
