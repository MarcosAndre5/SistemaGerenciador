@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Entradas</h3>
			<a href="compra/create">
				<button class="btn btn-success">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Cadastrar Nova Entrada
				</button>
			</a>
			@include('entrada.compra.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Data</th>
						<th>Fornecedor</th>
						<th>Comprovante</th>
						<th>Taxa</th>
						<th>Total</th>
						<th>Status</th>
						<th>Opções</th>
					</thead>
					@foreach ($entradas as $entrada)
						<tr>
							<td>{{ \Carbon\Carbon::parse($entrada->data_hora_entrada)->format('d/m/Y') }}</td>
							<td>{{ $entrada->nome_fornecedor }}</td>
							<td>{{ $entrada->tipo_comprovante_entrada.' - '.$entrada->serie_comprovante_entrada.' - '.$entrada->numero_comprovante_entrada }}</td>
							<td>{{ $entrada->taxa_entrada }}</td>
							<td>{{ $entrada->total }}</yd>
							<td>{{ $entrada->estado_entrada }}</td>
							<td>
								<a href="{{ URL::action('EntradaController@show', $entrada->id_entrada) }}">
									<button class="btn btn-info">
										<i class="fa fa-pencil" aria-hidden="true"></i>
										Detalhes
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{$entrada->id_entrada}}" data-toggle="modal">
									<button class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
										Cancelar Compra
									</button>
								</a>
							</td>
						</tr>
						@include('entrada.compra.modal')
					@endforeach
				</table>
			</div>
			{{$entradas->render()}}
		</div>
	</div>
@stop
