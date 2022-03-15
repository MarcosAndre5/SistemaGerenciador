<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class EntradaFormRequest extends FormRequest {
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nome' => 'required|max:50',
            'descricao' => 'max:256',
        ];
    }
}
