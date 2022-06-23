@extends('layouts.admin')

@section('title', 'Saídas > CLIENTES')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Clientes</h3>
			<a href="{{ url('saida/cliente/create') }}">
				<button class="btn btn-success">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Cadastrar Novo Cliente
				</button>
			</a>
			<br></br>
			@include('saida.cliente.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nome</th>
						<th>Endereço</th>
						<th>Email</th>
						<th>Telefone</th>
						<th>Número Documento</th>
						<th>Tipo Documento</th>
					</thead>
					@foreach ($clientes as $cliente)
						<tr>
							<td>{{ $cliente->nome_cliente }}</td>
							<td>{{ $cliente->endereco_cliente }}</td>
							<td>{{ $cliente->email_cliente }}</td>
							<td>{{ $cliente->telefone_cliente }}</td>
							<td>{{ $cliente->numero_documento_cliente }}</td>
							<td>{{ $cliente->documento_cliente }}</td>
							<td>
								<a href="{{ url('saida/cliente/editar/'.$cliente->id_cliente) }}">
									<button class="btn btn-info">
										<i class="fa fa-pencil" aria-hidden="true"></i>
										Editar Cliente
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{ $cliente->id_cliente }}" data-toggle="modal">
									<button class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
										Deletar Cliente
									</button>
								</a>
							</td>
						</tr>
						@include('saida.cliente.modal')
					@endforeach
				</table>
			</div>
			{{ $clientes->render() }}
		</div>
	</div>
@stop
