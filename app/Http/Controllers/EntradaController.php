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
					DB::raw('sum(i.quantidade_informacoesEntrada * i.valor_entrada_informacoesEntrada as total)'))
				->where('e.numero_comprovante_entrada', 'LIKE', '%'.$palavra.'%')
				->orderBy('e.id_entrada', 'desc')
				->groupBy('e.id_entrada', 'e.data_hora_entrada', 'f.nome_fornecedor', 'e.tipo_comprovante_entrada',
					'e.serie_comprovante_entrada', 'e.taxa_entrada', 'e.estado_entrada')
				->paginate(5);
			
				dd($entradas);
			
			return view('entrada.compra.index', ['entradas' => $entradas, 'buscaTexto' => $palavra]);
		}
	}

	public function create(){
		$fornecedores = DB::table('fornecedores')->get();
		$produtos = DB::table('produtos as p')
			->select(DB::raw('CONCAT(p.codigo_produto, " ", p.nome_produto) as produtos'), 'p.id_produto')
			->where('p.estado_produto', '=', '1')
			->get();
		dd($produtos);
		return view('entrada.compra.create');
	}

	public function store(CategoriaFormRequest $request){

		try{
			DB::beginTransaction();

			$entrada = new Entrada;
			$informacoesEntrada = new InformacoesEntrada;
		
			$entrada->id_fornecedor_entrada = $request->get('idfornecedor');
			$entrada->tipo_comprovante_entrada = $request->get('tipo_comprovante');
			$entrada->serie_comprovante_entrada = $request->get('serie_comprovante');
			$entrada->numero_comprovante_entrada = $request->get('numero_comprovante');
			$entrada->_entrada = $request->get('');
			$entrada->_entrada = $request->get('');

			$data = Carbon::row('America/Recife');

			$entrada->save();

			return Redirect::to('estoque/categoria');

			DB::commit();
		}catch(\Exception $excecao){

		}

		
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
