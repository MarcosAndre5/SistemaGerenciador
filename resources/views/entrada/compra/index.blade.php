@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Entradas</h3>
			<a href="entrada/create">
				<button class="btn btn-success">
					Cadastrar Nova Entrada
					<i class="fa fa-plus" aria-hidden="true"></i>
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
						<th>Tipo de Comprovante</th>
						<th>Série do Comprovante</th>
						<th>Número Comprovante</th>
						<th>Taxa</th>
						<th>Status</th>
						<th>Opções</th>
					</thead>
					@foreach ($entradas as $entrada)
						<tr>
							<td>{{ $entrada->data_entrada }}</td>
							<td>{{ $entrada->nome_fornecedor }}</td>
							<td>{{ $entrada->tipo_comprovante_entrada }}</td>
							<td>{{ $entrada->serie_comprovante_entrada }}</td>
							<td>{{ $entrada->numero_comprovante_entrada }}</td>
							<td>{{ $entrada->taxa_entrada }}</td>
							<td>{{ $entrada->estado_entrada }}</td>
							<td>
								<a href="{{ URL::action('EntradaController@show', $entrada->id_entrada) }}">
									<button class="btn btn-info">
										Detalhes
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{$entrada->id_entrada}}" data-toggle="modal">
									<button class="btn btn-danger">
										Excluir
										<i class="fa fa-trash" aria-hidden="true"></i>
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
