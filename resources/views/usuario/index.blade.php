@extends('layouts.admin')

@section('title', 'AÇAÍ DO RIO > USUÁRIOS')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Usuarios</h3>
			<a href="{{ url('usuario/create') }}">
				<button class="btn btn-success">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Cadastrar Usuário
				</button>
			</a>
			<br></br>
			@include('usuario.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>NOME</th>
						<th>EMAIL</th>
					</thead>
					@foreach($usuarios as $usuario)
						<tr>
							<td>{{ $usuario->name }}</td>
							<td>{{ $usuario->email }}</td>
							<td>
								<a href="{{ URL::action('FornecedorController@edit', $usuario->id) }}">
									<button class="btn btn-info">
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{ $usuario->id }}" data-toggle="modal">
									<button class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</button>
								</a>
							</td>
						</tr>
						@include('usuario.modal')
					@endforeach
				</table>
			</div>
			{{ $usuarios->render() }}
		</div>
	</div>
@stop
