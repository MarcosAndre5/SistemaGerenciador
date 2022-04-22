<?php

namespace App\Http\Controllers;

use DB;
use App\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\FornecedorFormRequest;

class FornecedorController extends Controller {
	public function __construct(){ }

	public function index(Request $request){
		if($request){
			$palavra = trim($request->get('buscaTexto'));
			
			$fornecedores = DB::table('fornecedores')
				->where('tipo_fornecedor', '!=', '0')
				->where('nome_fornecedor', 'LIKE', '%'.$palavra.'%')
				->orwhere('numero_documento_fornecedor', 'LIKE', '%'.$palavra.'%')
				->orderBy('id_fornecedor', 'desc')
				->paginate(5);
			
			return view('entrada.fornecedor.index', ['fornecedores'=>$fornecedores, 'buscaTexto'=>$palavra]);
		}
	}

	public function create(){
		return view('entrada.fornecedor.create');
	}

	public function store(FornecedorFormRequest $request){
		$fornecedor = new Fornecedor;
		
		$fornecedor->tipo_fornecedor = 'fornecedor';
		$fornecedor->nome_fornecedor = $request->get('nome');
		$fornecedor->email_fornecedor = $request->get('email');
		$fornecedor->telefone_fornecedor = $request->get('telefone');
		$fornecedor->endereco_fornecedor = $request->get('endereco');
		$fornecedor->documento_fornecedor = $request->get('tipo_documento');
		$fornecedor->estado_fornecedor = '1';
		
		$numDoc = preg_replace("/[^0-9]/", "", $request->get('numero_documento'));

		if($request->get('tipo_documento') == 'CPF')
			$numDoc = substr($numDoc, 0, 3).'.'.substr($numDoc, 3, 3).'.'.substr($numDoc, 6, 3).'-'.substr($numDoc, 9, 2);
		else if($request->get('tipo_documento') == 'CNPJ')
			$numDoc = substr($numDoc, 0, 2).'.'.substr($numDoc, 2, 3).'.'.substr($numDoc, 5, 3).'/'.substr($numDoc, 8, 4).'-'.substr($numDoc, -2);

		$fornecedor->numero_documento_fornecedor = $numDoc;
				
		$fornecedor->save();

		return Redirect::to('entrada/fornecedor');
	}

	public function show($id){
		return view('entrada.fornecedor.show', ['fornecedor'=>Fornecedor::findOrFail($id)]);
	}

	public function edit($id){
		$fornecedor = Fornecedor::findOrFail($id);
		
		return view('entrada.fornecedor.edit', ['fornecedor'=>$fornecedor]);
	}

	public function update(FornecedorFormRequest $request, $id){
		$fornecedor = Fornecedor::findOrFail($id);

		$fornecedor->tipo_fornecedor = 'fornecedor';
		$fornecedor->nome_fornecedor = $request->get('nome');
		$fornecedor->email_fornecedor = $request->get('email');
		$fornecedor->telefone_fornecedor = $request->get('telefone');
		$fornecedor->endereco_fornecedor = $request->get('endereco');
		$fornecedor->documento_fornecedor = $request->get('tipo_documento');
		$fornecedor->estado_fornecedor = '1';
		
		$numDoc = preg_replace("/[^0-9]/", "", $request->get('numero_documento'));
 
		if($request->get('tipo_documento') == 'CPF')
			$numDoc = substr($numDoc, 0, 3).'.'.substr($numDoc, 3, 3).'.'.substr($numDoc, 6, 3).'-'.substr($numDoc, 9, 2);
		else if($request->get('tipo_documento') == 'CNPJ')
			$numDoc = substr($numDoc, 0, 2).'.'.substr($numDoc, 2, 3).'.'.substr($numDoc, 5, 3).'/'.substr($numDoc, 8, 4).'-'.substr($numDoc, -2);

		$fornecedor->numero_documento_fornecedor = $numDoc;
		
		$fornecedor->update();

		return Redirect::to('entrada/fornecedor');
	}

	public function destroy($id){
		$fornecedor = Fornecedor::findOrFail($id);

		$fornecedor->estado_fornecedor = '0';

		$fornecedor->update();

		return Redirect::to('entrada/fornecedor');
	}
}
