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
            'id_fornecedor' => 'required',
            'tipo_comprovante' => 'required|max:20',
            'serie_comprovante' => 'required|max:20',
            'numero_comprovante' => 'required|max:20',
            
            'id_produto' => 'required',
            'quantidade' => 'required|max:20',
            'preco_compra' => 'required',
            'preco_venda' => 'required',
        ];
    }
}
