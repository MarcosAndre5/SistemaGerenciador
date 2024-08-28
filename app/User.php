<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable {
    protected $table = 'users';
	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable = [
		'name',
		'email',
		'password',
		'remember_token',
		'created_at',
		'updated_at',
	];

	protected $guarded = [];

    public function getAuthIdentifierName() { return 'id'; }

    public function getAuthIdentifier() { return $this->getKey(); }

    public function getAuthPassword() { return $this->password; }

    public function getRememberToken() { return $this->remember_token; }

    public function setRememberToken($value) { $this->remember_token = $value; }

    public function getRememberTokenName() { return 'remember_token'; }
}