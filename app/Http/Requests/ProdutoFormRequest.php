<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class ProdutoFormRequest extends FormRequest {
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'idcategoria' => 'required',
            'codigo' => 'max:45',
            'nome' => 'required|max:45',
            'descricao' => 'max:100',
            'imagem' => 'mimes:jpeg,jpg,png,bmp',
        ];
    }
}
