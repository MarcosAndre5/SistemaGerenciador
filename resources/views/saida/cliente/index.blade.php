@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Clientes</h3>
			<a href="{{URL::action('ClienteController@create')}}">
				<button class="btn btn-success">
					Adicionar Novo Cliente
					<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
			</a>
			@include('saida.cliente.search')
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
					@foreach ($pessoas as $pessoa)
						<tr>
							<td>{{ $pessoa->idpessoa }}</td>
							<td>{{ $pessoa->nome }}</td>
							<td>{{ $pessoa->email }}</td>
							<td>{{ $pessoa->telefone }}</td>
							<td>{{ $pessoa->tipo_documento }}</td>
							<td>{{ $pessoa->numero_documento }}</td>
							<td>{{ $pessoa->endereco }}</td>
							<td>
								<a href="{{URL::action('ClienteController@edit', $pessoa->idpessoa)}}">
									<button class="btn btn-info">
										Editar
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{$pessoa->idpessoa}}" data-toggle="modal">
									<button class="btn btn-danger">
										Excluir
										<i class="fa fa-trash" aria-hidden="true"></i>
									</button>
								</a>
							</td>
						</tr>
						@include('saida.cliente.modal')
					@endforeach
				</table>
			</div>
			{{$pessoas->render()}}
		</div>
	</div>
@stop
