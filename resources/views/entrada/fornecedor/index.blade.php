@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Fornecedores</h3>
			<a href="{{ URL::action('FornecedorController@create') }}">
				<button class="btn btn-success">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Cadastrar Novo Fornecedor
				</button>
			</a>
			@include('entrada.fornecedor.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Telefone</th>
						<th>Tipo Documento</th>
						<th>Número Documento</th>
						<th>Endereço</th>
					</thead>
					@foreach($fornecedores as $fornecedor)
						<tr>
							<td>{{ $fornecedor->id_fornecedor }}</td>
							<td>{{ $fornecedor->nome_fornecedor }}</td>
							<td>{{ $fornecedor->email_fornecedor }}</td>
							<td>{{ $fornecedor->telefone_fornecedor }}</td>
							<td>{{ $fornecedor->documento_fornecedor }}</td>
							<td>{{ $fornecedor->numero_documento_fornecedor }}</td>
							<td>{{ $fornecedor->endereco_fornecedor }}</td>
							<td>
								<a href="{{URL::action('FornecedorController@edit', $fornecedor->id_fornecedor)}}">
									<button class="btn btn-info">
										<i class="fa fa-pencil" aria-hidden="true"></i>
										Editar
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{$fornecedor->id_fornecedor}}" data-toggle="modal">
									<button class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
										Excluir
									</button>
								</a>
							</td>
						</tr>
						@include('entrada.fornecedor.modal')
					@endforeach
				</table>
			</div>
			{{ $fornecedores->render() }}
		</div>
	</div>
@stop
