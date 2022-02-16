<?php

namespace App\Http\Controllers;

use DB;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProdutoFormRequest;

class ProdutoController extends Controller {
	public function __construct(){ }

	public function index(Request $request){
		if($request){
			$palavra = trim($request->get('buscaTexto'));
			
			$produtos = DB::table('produtos as p')
				->join('categorias as c', 'p.id_categoria_produto', '=', 'c.id_categoria')
				->select('p.id_produto', 'p.nome_produto', 'p.codigo_produto', 'p.estoque_produto',
					'c.nome_categoria as categorias', 'p.descricao_produto', 'p.imagem_produto', 'p.estado_produto')
				->where('estado_produto', '=', '1')
				->where('p.nome_produto', 'LIKE', '%'.$palavra.'%')
				->orwhere('p.codigo_produto', 'LIKE', '%'.$palavra.'%')
				->orderBy('id_produto', 'desc')
				->paginate(5);

			return view('estoque.produto.index', ['produtos'=>$produtos, 'buscaTexto'=>$palavra]);
		}
	}

	public function create(){
		$categorias = DB::table('categorias')
			->where('estado_categoria', '=', '1')->get();

		return view('estoque.produto.create', ['categorias' => $categorias]);
	}

	public function store(ProdutoFormRequest $request){
		$produto = new Produto;
		
		$produto->id_categoria_produto = $request->get('idcategoria');
		$produto->codigo_produto = $request->get('codigo');
		$produto->nome_produto = $request->get('nome');
		$produto->estoque_produto = $request->get('estoque');
		$produto->descricao_produto = $request->get('descricao');
		$produto->estado_produto = '1';
		
		if(Input::hasFile('imagem')){
			$file = Input::file('imagem');
			
			$nomeImagem = str_replace(" ", "", $produto->nome_produto).'.'.$file->extension();

			$file->move(public_path('imagens/produtos/'), $nomeImagem);

			$produto->imagem_produto = $nomeImagem;
		}else{
			$produto->imagem_produto = 'Sem Imagem';
		}
		$produto->save();

		return Redirect::to('estoque/produto');
	}

	public function show($id){
		return view('estoque.produto.show', ['produto' => Produto::findOrFail($id)]);
	}

	public function edit($id){
		$produto = Produto::findOrFail($id);

		$categorias = DB::table('categorias')->where('estado_categoria', '=', '1')->get();

		return view('estoque.produto.edit', ['produto' => $produto, 'categorias' => $categorias]);
	}

	public function update(ProdutoFormRequest $request, $id){
		$produto = Produto::findOrFail($id);
		
		$produto->id_categoria_produto = $request->get('idcategoria');
		$produto->codigo_produto = $request->get('codigo');
		$produto->nome_produto = $request->get('nome');
		$produto->estoque_produto = $request->get('estoque');
		$produto->descricao_produto = $request->get('descricao');
		$produto->estado_produto = $request->get('estado');

		if(Input::hasFile('imagem')){
			$file = Input::file('imagem');
			
			$nomeImagem = str_replace(" ", "", $produto->nome_produto).'.'.$file->extension();

			$file->move(public_path('imagens/produtos/'), $nomeImagem);

			$produto->imagem_produto = $nomeImagem;
		}else{
			$produto->imagem_produto = 'Sem Imagem';
		}
		$produto->update();

		return Redirect::to('estoque/produto');
	}

	public function destroy($id){
		$produto = Produto::findOrFail($id);

		$produto->estado_produto = '0';

		$produto->update();

		return Redirect::to('estoque/produto');
	}
}
