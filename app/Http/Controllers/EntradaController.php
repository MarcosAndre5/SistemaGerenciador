<?php

namespace App\Http\Controllers;

use DB;
use Response;
use App\Entrada;
use Carbon\Carbon;
use App\InformacoesEntrada;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EntradaFormRequest;

class EntradaController extends Controller {
	public function __construct(){ }

	public function index(Request $request){
		if($request){
			$palavra = trim($request->get('buscaTexto'));
			
			$entradas = DB::table('entradas as e')
				->join('fornecedores as f', 'f.id_fornecedor', '=', 'e.id_fornecedor_entrada')
				->join('informacoesEntrada as i', 'i.id_entrada_informacoesEntrada', '=', 'e.id_entrada')
				->select('e.id_entrada', 'e.data_hora_entrada', 'f.nome_fornecedor', 'e.tipo_comprovante_entrada',
					'e.serie_comprovante_entrada', 'e.taxa_entrada', 'e.estado_entrada',
					DB::raw('sum(i.quantidade_informacoesEntrada * i.valor_entrada_informacoesEntrada as total)'));
			dd($entradas);
			
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
