@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Categorias</h3>
			<a href="{{URL::action('CategoriaController@create')}}">
				<button class="btn btn-success">
					Adicionar Nova Categoria
					<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
			</a>
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
							<td>{{ $categoria->idcategoria }}</td>
							<td>{{ $categoria->nome }}</td>
							<td>{{ $categoria->descricao }}</td>
							<td>
								<a href="{{URL::action('CategoriaController@edit', $categoria->idcategoria)}}">
									<button class="btn btn-info">
										Editar
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{$categoria->idcategoria}}" data-toggle="modal">
									<button class="btn btn-danger">
										Excluir
										<i class="fa fa-trash" aria-hidden="true"></i>
									</button>
								</a>
							</td>
						</tr>
						@include('estoque.categoria.modal')
					@endforeach
				</table>
			</div>
			{{$categorias->render()}}
		</div>
	</div>
@stop
