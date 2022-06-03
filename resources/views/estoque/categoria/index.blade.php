@extends('layouts.admin')

@section('title', 'Estoque > CATEGORIA')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Categorias</h3>
			<a href="{{ url('estoque/categoria/create') }}">
				<button class="btn btn-success">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Cadastrar Nova Categoria
				</button>
			</a>
			<br></br>
			@include('estoque.categoria.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Opções</th>
					</thead>
					@foreach ($categorias as $categoria)
						<tr>
							<td>{{ $categoria->id_categoria }}</td>
							<td>{{ $categoria->nome_categoria }}</td>
							<td>{{ $categoria->descricao_categoria }}</td>
							<td>
								<a href="{{ url('estoque/categoria/editar/'.$categoria->id_categoria) }}">
									<button class="btn btn-info">
										<i class="fa fa-pencil" aria-hidden="true"></i>
										Editar Categoria
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{ $categoria->id_categoria }}" data-toggle="modal">
									<button class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
										Deletar Categoria
									</button>
								</a>
							</td>
						</tr>
						@include('estoque.categoria.modal')
					@endforeach
				</table>
			</div>
			{{ $categorias->render() }}
		</div>
	</div>
@stop
