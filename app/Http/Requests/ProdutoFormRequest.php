<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest {
    public function authorize(){
        return false;
    }

    public function rules(){
        return [
            'idcategoria' => 'required',
            'estoque' => 'required',
            'codigo' => 'max:45',
            'nome' => 'required|max:45',
            'descricao' => 'max:100',
            'imagem' => 'mines:jpeg,png,bmp',
        ];
    }
}
