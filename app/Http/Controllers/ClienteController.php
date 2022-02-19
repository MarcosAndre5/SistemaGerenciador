<?php

namespace App\Http\Controllers;

use DB;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClienteFormRequest;

class ClienteController extends Controller {
    public function __construct(){ }

	public function index(Request $request){
		if($request){
			$palavra = trim($request->get('buscaTexto'));
			
			$clientes = DB::table('clientes')
				->where('tipo_cliente', '!=', '0')
				->where('nome_cliente', 'LIKE', '%'.$palavra.'%')
				->orwhere('numero_documento_cliente', 'LIKE', '%'.$palavra.'%')
				->orderBy('id_cliente', 'desc')
				->paginate(5);
			
			return view('saida.cliente.index', ['clientes'=>$clientes, 'buscaTexto'=>$palavra]);
		}
	}

	public function create(){
		return view('saida.cliente.create');
	}

	public function store(ClienteFormRequest $request){
		$cliente = new Cliente;
		
		$cliente->tipo_cliente = 'cliente';
		$cliente->nome_cliente = $request->get('nome');
		$cliente->email_cliente = $request->get('email');
		$cliente->telefone_cliente = $request->get('telefone');
		$cliente->endereco_cliente = $request->get('endereco');
		$cliente->documento_cliente = $request->get('tipo_documento');
		
		$numDoc = preg_replace("/[^0-9]/", "", $request->get('numero_documento'));
 
        if($request->get('documento') == 'CPF') {
            $numDoc = substr($numDoc, 0, 3).'.'.substr($numDoc, 3, 3).'.'.substr($numDoc, 6, 3).'-'.substr($numDoc, 9, 2);
		} else if($request->get('documento') == 'CNPJ'){
			$numDoc = substr($numDoc, 0, 2).'.'.substr($numDoc, 2, 3).'.'.substr($numDoc, 5, 3).'/'.substr($numDoc, 8, 4).'-'.substr($numDoc, -2);
		}

		$cliente->numero_documento_cliente = $numDoc;
				
		$cliente->save();

		return Redirect::to('saida/cliente');
	}

	public function show($id){
		return view('saida.cliente.show', ['cliente' => Cliente::findOrFail($id)]);
	}

	public function edit($id){
		$cliente = Cliente::findOrFail($id);
		//dd($cliente);
		return view('saida.cliente.edit', ['cliente' => $cliente]);
	}

	public function update(ClienteFormRequest $request, $id){
		$cliente = Cliente::findOrFail($id);
		
		$cliente->tipo_cliente = 'cliente';
		$cliente->nome_cliente = $request->get('nome');
		$cliente->email_cliente = $request->get('email');
		$cliente->telefone_cliente = $request->get('telefone');
		$cliente->endereco_cliente = $request->get('endereco');
		$cliente->documento_cliente = $request->get('tipo_documento');

		$numDoc = preg_replace("/[^0-9]/", "", $request->get('numero_documento'));
 
        if($request->get('documento') == 'CPF') {
            $numDoc = substr($numDoc, 0, 3).'.'.substr($numDoc, 3, 3).'.'.substr($numDoc, 6, 3).'-'.substr($numDoc, 9, 2);
		} else if($request->get('documento') == 'CNPJ'){
			$numDoc = substr($numDoc, 0, 2).'.'.substr($numDoc, 2, 3).'.'.substr($numDoc, 5, 3).'/'.substr($numDoc, 8, 4).'-'.substr($numDoc, -2);
		}

		$cliente->numero_documento_cliente = $numDoc;

		$cliente->update();

		return Redirect::to('saida/cliente');
	}

	public function destroy($id){
		$cliente = Cliente::findOrFail($id);

		$cliente->tipo_cliente = '0';

		$cliente->update();

		return Redirect::to('saida/cliente');
	}
}
