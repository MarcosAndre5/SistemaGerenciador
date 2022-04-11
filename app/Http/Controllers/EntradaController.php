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
				->join('fornecedores as f', 'e.id_fornecedor_entrada', '=', 'f.id_fornecedor')
				->join('informacoesEntrada as i', 'i.id_entrada_informacoesEntrada', '=', 'e.id_entrada')
				->select('e.id_entrada', 'e.data_hora_entrada', 'f.nome_fornecedor', 'e.tipo_comprovante_entrada',
					'e.serie_comprovante_entrada', 'e.numero_comprovante_entrada','e.taxa_entrada', 'e.estado_entrada',
					DB::raw('sum(i.quantidade_informacoesEntrada * i.valor_entrada_informacoesEntrada) as total'))
				->where('estado_entrada', '=', '1')
				->where('e.numero_comprovante_entrada', 'LIKE', '%'.$palavra.'%')
				->orderBy('e.id_entrada', 'desc')
				->groupBy('e.id_entrada', 'e.data_hora_entrada', 'f.nome_fornecedor', 'e.tipo_comprovante_entrada',
					'e.serie_comprovante_entrada', 'e.numero_comprovante_entrada', 'e.taxa_entrada', 'e.estado_entrada')
				->paginate(5);
				
			return view('entrada.compra.index', ['entradas' => $entradas, 'buscaTexto' => $palavra]);
		}
	}

	public function create(){
		$fornecedores = DB::table('fornecedores')->get();
		$produtos = DB::table('produtos as p')
			->select(DB::raw('CONCAT(p.codigo_produto, " ", p.nome_produto) as produtos'), 'p.id_produto')
			->where('p.estado_produto', '=', '1')
			->get();
		
		return view('entrada.compra.create');
	}

	public function store(CategoriaFormRequest $request){

		try{
			DB::beginTransaction();
			$entrada = new Entrada;
			
			$entrada->id_fornecedor_entrada = $request->get('id_fornecedor');
			$entrada->tipo_comprovante_entrada = $request->get('tipo_comprovante');
			$entrada->serie_comprovante_entrada = $request->get('serie_comprovante');
			$entrada->numero_comprovante_entrada = $request->get('numero_comprovante');
			$entrada->taxa_entrada = $request->get('taxa_entrada');
			$entrada->estado_entrada = 1;

			dd(Carbon::row('America/Recife'));
			$data = Carbon::row('America/Recife');
			$entrada->data_hora_entrada = $data->toDateTimeString();
			
			$entrada->save();

			$id_produto_informacoesEntrada->get('id_produto');
			$quantidade_informacoesEntrada->get('quantidade');
			$valor_entrada_informacoesEntrada->get('valor_compra');
			$valor_saida_informacoesEntrada->get('valor_venda');

			$contador = 0;
			while($contador < count($id_produto_informacoesEntrada)){
				$informacoesEntrada = new InformacoesEntrada;

				$informacoesEntrada->id_entrada_informacoesEntrada = $entrada->id_entrada;
				$informacoesEntrada->id_produto_informacoesEntrada = $id_produto[$contador];
				$informacoesEntrada->quantidade_informacoesEntrada = $quantidade[$contador];
				$informacoesEntrada->valor_entrada_informacoesEntrada = $valor_entrada[$contador];
				$informacoesEntrada->valor_saida_informacoesEntrada = $valor_saida[$contador];

				$informacoesEntrada->save();
				
				$contador++;
			}
			DB::commit();
		}catch(\Exception $excecao){
			DB::rollback();
		}
		return Redirect::to('entrada/compra');
	}

	public function show($id){
		$entrada = DB::table('entradas as e')
			->join('fornecedores as f', 'f.id_fornecedor', '=', 'e.id_fornecedor_entrada')
			->join('informacoesEntrada as i', 'i.id_entrada_informacoesEntrada', '=', 'e.id_entrada')
			->select('e.id_entrada', 'e.data_hora_entrada', 'f.nome_fornecedor', 'e.tipo_comprovante_entrada',
				'e.serie_comprovante_entrada', 'e.numero_comprovante_entrada', 'e.taxa_entrada', 'e.estado_entrada',
				DB::raw('sum(i.quantidade_informacoesEntrada * i.valor_entrada_informacoesEntrada) as total'))
			->where('e.id_entrada', '=', $id)
			->first();

		$info = DB::table('informacoesEntrada as i')
			->join('produtos as p', 'i.id_produto_informacoesEntrada', '=', 'p.id_produto')
			->select('p.nome_produto as produto', 'i.quantidade_informacoesEntrada', 'i.valor_entrada_informacoesEntrada', 'i.valor_saida_informacoesEntrada')
			->get();

		return view('entrada.compra.show', ['entrada' => $entrada, 'informacoes' => $info]);
	}

	public function destroy($id){
		$entrada = Entrada::findOrFail($id);
		
		$entrada->estado_entrada = '0';
		
		$entrada->update();

		return Redirect::to('entrada/compra');
	}
}
