<?php

namespace App\Http\Controllers;

use DB;
use Response;
use App\Saida;
use Carbon\Carbon;
use App\InformacoesSaida;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests\SaidaFormRequest;
use Illuminate\Support\Facades\Redirect;

class SaidaController extends Controller {
    public function __construct(){ }

	public function index(Request $request){
		if($request){
			$palavra = trim($request->get('buscaTexto'));
			
			$saidas = DB::table('saidas as s')
				->join('clientes as c', 's.id_cliente_saida', '=', 'c.id_cliente')
				->join('informacoesSaida as i', 'i.id_saida_informacoesSaida', '=', 's.id_saida')
				->select('s.id_saida', 's.data_hora_saida', 'c.nome_cliente', 's.tipo_comprovante_saida', 's.serie_comprovante_saida',
                    's.numero_comprovante_saida','s.taxa_saida', 's.estado_saida', 's.total_saida')
				->where('estado_saida', '=', '1')
				->where('s.numero_comprovante_saida', 'LIKE', '%'.$palavra.'%')
				->orderBy('s.data_hora_saida', 'desc')
				->paginate(5);
				
			return view('saida.venda.index', ['saidas'=>$saidas, 'buscaTexto'=>$palavra]);
		}
	}

	public function create(){
		$clientes = DB::table('clientes')->get();
		
		$produtos = DB::table('produtos as p')
			->join('informacoesEntrada as i', 'p.id_produto', '=', 'i.id_produto_informacoesEntrada')
			->select('p.id_produto', 'p.codigo_produto', 'p.nome_produto', 'p.estoque_produto',
				DB::raw('avg(i.valor_saida_informacoesEntrada) as preco_medio'))
			->where('p.estoque_produto', '>', '0')
			->where('p.estado_produto', '=', '1')
			->groupBy('p.id_produto', 'p.codigo_produto', 'p.nome_produto', 'p.estoque_produto')
			->get();
			
		return view('saida.vendas.create', ['clientes'=>$clientes, 'produtos'=>$produtos]);
	}

	public function store(SaidaFormRequest $request){
		try{
			DB::beginTransaction();
			
			$saida = new Saida;

			$data = Carbon::now('America/Recife');
			$saida->id_cliente_saida = $request->get('id_fornecedor');
			$saida->tipo_comprovante_saida = $request->get('tipo_comprovante');
			$saida->serie_comprovante_saida = $request->get('serie_comprovante');
			$saida->numero_comprovante_saida = $request->get('numero_comprovante');
			$saida->taxa_saida = $request->get('taxa_entrada');
			$saida->total_saida = $request->get('total_saida');
			$saida->estado_saida = '1';
			$saida->data_hora_saida = $data->toDateTimeString();
			
			$saida->save();

			$id_produto = $request->get('id_produto');
			$quantidade = $request->get('quantidade');
			$desconto = $request->get('desconto');
			$valor_saida = $request->get('preco_venda');

			for($i = 0; $i < count($id_produto); $i++){
				$informacoesSaida = new InformacoesSaida;

				$informacoesSaida->id_saida_informacoesSaida = $saida->id_saida;
				$informacoesSaida->id_produto_informacoesSaida = $id_produto[$i];
				$informacoesSaida->quantidade_informacoesSaida = $quantidade[$i];
				$informacoesSaida->desconto_informacoesSaida = $desconto[$i];
				$informacoesSaida->valor_saida_informacoesSaida = $valor_saida[$i];

				$informacoesSaida->save();
			}
			DB::commit();
		}catch(\Exception $excecao){
			DB::rollback();
		}
		return Redirect::to('saida/vendas');
	}

	public function show($id){
		$saida = DB::table('saidas as s')
			->join('clientes as c', 'c.id_cliente', '=', 's.id_cliente_saida')
			->join('informacoesSaida as i', 'i.id_saida_informacoesSaida', '=', 's.id_saida')
			->select('s.id_saida', 's.data_hora_saida', 'c.nome_cliente', 's.tipo_comprovante_saida',
				's.serie_comprovante_saida', 's.numero_comprovante_saida', 's.taxa_saida', 's.estado_saida', 's.total_saida')
			->where('s.id_saida', '=', $id)
			->first();
		
		$informacoesSaida = DB::table('informacoesSaida as i')
			->join('produtos as p', 'i.id_produto_informacoesSaida', '=', 'p.id_produto')
			->select('p.nome_produto as produto', 'i.quantidade_informacoesSaida', 'i.desconto_informacoesSaida', 'i.valor_saida_informacoesSaida')
			->where('i.id_saida_informacoesSaida', '=', $id)
			->get();
		
		return view('saida.vendas.show', ['saida'=>$saida, 'informacoes'=>$informacoesSaida]);
	}

	public function destroy($id){
		$saida = Saida::findOrFail($id);
		
		$saida->estado_saida = '0';
		
		$saida->update();

		return Redirect::to('saida/vendas');
	}
}
