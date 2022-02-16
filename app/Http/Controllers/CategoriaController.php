<?php

namespace App\Http\Controllers;

use DB;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;

class CategoriaController extends Controller {
	public function __construct(){ }

	public function index(Request $request){
		if($request){
			$palavra = trim($request->get('buscaTexto'));
			
			$categorias = DB::table('categorias')
				->where('nome_categoria', 'LIKE', '%'.$palavra.'%')
				->where('estado_categoria', '=', '1')
				->orderBy('id_categoria', 'desc')
				->paginate(5);
			
			return view('estoque.categoria.index', ["categorias"=>$categorias, "buscaTexto"=>$palavra]);
		}
	}

	public function create(){
		return view('estoque.categoria.create');
	}

	public function store(CategoriaFormRequest $request){
		$categoria = new Categoria;
		
		$categoria->nome_categoria = $request->get('nome');
		$categoria->descricao_categoria = $request->get('descricao');
		$categoria->estado_categoria = 1;
		
		$categoria->save();

		return Redirect::to('estoque/categoria');
	}

	public function show($id){
		return view("estoque.categoria.show", ["categoria" => Categoria::findOrFail($id)]);
	}

	public function edit($id){
		return view("estoque.categoria.edit", ["categoria" => Categoria::findOrFail($id)]);
	}

	public function update(CategoriaFormRequest $request, $id){
		$categoria = Categoria::findOrFail($id);
		
		$categoria->nome_categoria = $request->get('nome');
		$categoria->descricao_categoria = $request->get('descricao');
		$categoria->estado_categoria = 1;
		
		$categoria->update();

		return Redirect::to('estoque/categoria');
	}

	public function destroy($id){
		$categoria = Categoria::findOrFail($id);
		
		$categoria->estado_categoria = '0';
		
		$categoria->update();

		return Redirect::to('estoque/categoria');
	}
}
