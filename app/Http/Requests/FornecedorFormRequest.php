<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorFormRequest extends FormRequest {
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nome' => 'required|max:100',
            'tipo_documento' => 'max:20',
            'numero_documento' => 'max:20',
            'endereco' => 'max:100',
            'telefone' => 'max:20',
            'email' => 'max:50',
        ];
    }
}
