@extends('layouts.admin')

@section('title', 'Saídas > REGISTRO DE SAÍDAS')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Saídas de Produtos</h3>
			<a href="{{ url('saida/venda/create') }}">
				<button class="btn btn-success">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Cadastrar Nova Saída de Produtos
				</button>
			</a>
			<br></br>
			@include('saida.venda.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Data</th>	
						<th>Nº Comprovante</th>	
						<th>Cliente</th>
						<th>Forma de Pagamento</th>
						<th>Série Comprovante</th>
						<th>Custo Total</th>
						<th>Opções</th>
					</thead>
					@foreach ($saidas as $saida)
						<tr>
							<td>{{ \Carbon\Carbon::parse($saida->data_hora_saida)->format('d/m/Y') }}</td>	
							<td>{{ $saida->numero_comprovante_saida }}</td>
							<td>{{ $saida->nome_cliente }}</td>
							<td>{{ $saida->tipo_comprovante_saida }}</td>
							<td>{{ $saida->serie_comprovante_saida }}</td>
							<td>{{ $saida->total_saida }} R$</yd>
 							<td>
								<a href="{{ url('saida/venda/detalhes/'.$saida->id_saida) }}">
									<button class="btn btn-info">
										<i class="fa fa-eye" aria-hidden="true"></i>
										Ver Detalhes
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{ $saida->id_saida }}" data-toggle="modal">
									<button class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
										Anular Saída
									</button>
								</a>
							</td>
						</tr>
						@include('saida.venda.modal')
					@endforeach
				</table>
			</div>
			{{ $saidas->render() }}
		</div>
	</div>
@stop
