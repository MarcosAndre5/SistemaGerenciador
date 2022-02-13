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
			
			$produtos = DB::table('produtos as prod')
				->join('categorias as cate', 'prod.idcategoria', '=', 'cate.idcategoria')
				->select('prod.idproduto', 'prod.nome', 'prod.codigo', 'prod.estoque', 'cate.nome as categorias', 'prod.descricao', 'prod.imagem', 'prod.estado')
				->where('estado', '=', 'Ativo')
				->where('prod.nome', 'LIKE', '%'.$query.'%')
				->orderBy('idproduto', 'desc')
				->paginate(5);

			return view('estoque.produto.index', ['produtos'=>$produtos, 'buscaTexto'=>$query]);
		}
	}

	public function create(){
		$categorias = DB::table('categorias')
			->where('condicao', '=', '1')
			->get();

		return view('estoque.produto.create', ['categorias' => $categorias]);
	}

	public function store(ProdutoFormRequest $request){
		$produto = new Produto;
		
		$produto->idcategoria = $request->get('idcategoria');
		$produto->codigo = $request->get('codigo');
		$produto->nome = $request->get('nome');
		$produto->estoque = $request->get('estoque');
		$produto->descricao = $request->get('descricao');
		$produto->estado = 'Ativo';
		
		if(Input::hasFile('imagem')){
			$file = Input::file('imagem');
			
			$nomeImagem = str_replace(" ", "", $produto->nome).'.'.$file->extension();

			$file->move(public_path('imagens/produtos/'), $nomeImagem);

			$produto->imagem = $nomeImagem;
		}
		$produto->save();

		return Redirect::to('estoque/produto');
	}

	public function show($id){
		return view('estoque.produto.show', ['produto' => Produto::findOrFail($id)]);
	}

	public function edit($id){
		$produto = Produto::findOrFail($id);

		$categorias = DB::table('categorias')
			->where('condicao', '=', '1')
			->get();

		return view('estoque.produto.edit', ['produto' => $produto, 'categorias' => $categorias]);
	}

	public function update(ProdutoFormRequest $request, $id){
		$produto = Produto::findOrFail($id);
		
		$produto->idcategoria = $request->get('idcategoria');
		$produto->codigo = $request->get('codigo');
		$produto->nome = $request->get('nome');
		$produto->estoque = $request->get('estoque');
		$produto->descricao = $request->get('descricao');
		$produto->estado = $request->get('estado');

		if(Input::hasFile('imagem')){
			$file = Input::file('imagem');
			
			$nomeImagem = str_replace(" ", "", $produto->nome).'.'.$file->extension();

			$file->move(public_path('imagens/produtos/'), $nomeImagem);

			$produto->imagem = $nomeImagem;
		}
		$produto->update();

		return Redirect::to('estoque/produto');
	}

	public function destroy($id){
		$produto = Produto::findOrFail($id);

		$produto->condicao = 'Inativo';

		$produto->update();

		return Redirect::to('estoque/produto');
	}
}
