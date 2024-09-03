@extends('layouts.admin')

@section('title', 'AÇAÍ DO RIO > USUÁRIOS > Cargos')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Cargos</h3>
			<a href="{{ url('cargo/create') }}">
				<button class="btn btn-success">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Cadastrar Cargo
				</button>
			</a>
			<br></br>
			@include('cargo.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			@if(count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			@if(session()->has('message'))
				<div class="alert alert-success">
					<ul><li>{{ session()->get('message') }}</li></ul>
				</div>
			@endif
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th class="text-center">DESCRIÇÃO</th>
							<th class="text-center">AÇÕES</th>
						</tr>
					</thead>
					@foreach($cargos as $cargo)
						<tr>
							<td>{{ $cargo->descricao }}</td>
							<td>
								<a href="{{ URL::action('CargoController@edit', $cargo->id) }}">
									<button class="btn btn-info">
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{ $cargo->id }}" data-toggle="modal">
									<button class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</button>
								</a>
							</td>
						</tr>
						@include('cargo.modal')
					@endforeach
				</table>
			</div>
			{{ $cargos->render() }}
		</div>
	</div>
@stop
