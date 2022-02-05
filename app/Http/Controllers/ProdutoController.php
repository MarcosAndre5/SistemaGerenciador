<?php

namespace App\Http\Controllers;

use DB;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProdutoFormRequest;

class ProdutoController extends Controller {
	public function __construct(){

	}

	public function index(Request $request){
		if($request){
			$query = trim($request->get('buscaTexto'));
			
			$produtos = DB::table('produtos as prod')
				->join('categorias.cate', 'prod.idcategoria', '=', 'cate.idcategoria')
				->select('prod.idproduto', 'prod.nome', 'prod.codigo', 'prod.estoque', 'cate.nome as categorias', 'prod.descricao', 'prod.imagem', 'prod.estado')
				->where('prod.nome', 'LIKE', '%'.$query.'%')
				->where('condicao', '=', '1')
				->orderBy('idcategoria', 'desc')
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
		$produto->estado = 'Ativo';
		$produto->imagem = $request->get('imagem');
		
		$produto->descricao = $request->get('descricao');
		$produto->estoque = $request->get('estoque');
		
		$produto->condicao = 1;
		
		$produto->save();

		return Redirect::to('estoque/produto');
	}

	public function show(){
		
	}

	public function edit(){
		
	}

	public function update(){
		
	}

	public function destroy(){
		
	}
}
