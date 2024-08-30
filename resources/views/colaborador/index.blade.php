@extends('layouts.admin')

@section('title', 'AÇAÍ DO RIO > USUÁRIOS > Colaboradores')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Colaboradores</h3>
			<a href="{{ url('colaborador/create') }}">
				<button class="btn btn-success">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Cadastrar Colaborador
				</button>
			</a>
			<br></br>
			@include('colaborador.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>NOME</th>
						<th>EMAIL</th>
						<th>CARGO</th>
						<th>AÇÕES</th>
					</thead>
					@foreach($colaboradores as $colaborador)
						<tr>
							<td>{{ $colaborador->name }}</td>
							<td>{{ $colaborador->email }}</td>
							<td>
								@if($colaborador->id_cargo == 1)
									Administrado do Sistema
								@elseif($colaborador->id_cargo == 2)
									Gerente
								@else
									Vendedor Interno/Externo
								@endif
							</td>
							<td>
								<a href="{{ URL::action('FornecedorController@edit', $colaborador->id) }}">
									<button class="btn btn-info">
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{ $colaborador->id }}" data-toggle="modal">
									<button class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</button>
								</a>
							</td>
						</tr>
						@include('colaborador.modal')
					@endforeach
				</table>
			</div>
			{{ $colaboradores->render() }}
		</div>
	</div>
@stop
