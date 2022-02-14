<?php

namespace App\Http\Controllers;

use DB;
use App\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PessoaFormRequest;

class ClienteController extends Controller {
    public function __construct(){ }

	public function index(Request $request){
		if($request){
			$query = trim($request->get('buscaTexto'));
			
			$pessoas = DB::table('pessoas')
				->where('nome', 'LIKE', '%'.$query.'%')	
				->where('tipo_pessoa', '=', 'Cliente')
				->orwhere('tipo_documento', '=', '%'.$query.'%')
				->where('tipo_pessoa', '=', 'Cliente')
				->orderBy('idpessoa', 'desc')
				->paginate(5);

			return view('saida.cliente.index', ['pessoas'=>$pessoas, 'buscaTexto'=>$query]);
		}
	}

	public function create(){
		return view('saida.cliente.create');
	}

	public function store(PessoaFormRequest $request){
		$pessoas = new Pessoa;
		
		$pessoas->tipo_pessoa = 'Cliente';
		$pessoas->nome = $request->get('nome');
		$pessoas->email = $request->get('email');
		$pessoas->telefone = $request->get('telefone');
		$pessoas->endereco = $request->get('endereco');
		$pessoas->tipo_documento = $request->get('tipo_documento');
		$pessoas->numero_documento = $request->get('numero_documento');
				
		$pessoas->save();

		return Redirect::to('saida/cliente');
	}

	public function show($id){
		return view('saida.cliente.show', ['pessoas' => Pessoa::findOrFail($id)]);
	}

	public function edit($id){
		$pessoas = Pessoa::findOrFail($id);

		$pessoas = DB::table('pessoas')
			->where('tipo_pessoa', '=', 'Cliente')
			->get();

		//dd($pessoas);

		return view('saida.cliente.edit', ['pessoa' => $pessoas]);
	}

	public function update(PessoaFormRequest $request, $id){
		$pessoas = Pessoa::findOrFail($id);
		
		$pessoas->tipo_pessoa = 'Cliente';
		$pessoas->nome = $request->get('nome');
		$pessoas->email = $request->get('email');
		$pessoas->telefone = $request->get('telefone');
		$pessoas->endereco = $request->get('endereco');
		$pessoas->tipo_documento = $request->get('tipo_documento');
		$pessoas->numero_documento = $request->get('numero_documento');

		$pessoas->update();

		return Redirect::to('saida/cliente');
	}

	public function destroy($id){
		$pessoas = Pessoa::findOrFail($id);

		$pessoas->tipo_pessoa = 'Inativo';

		$pessoas->update();

		return Redirect::to('saida/cliente');
	}
}
