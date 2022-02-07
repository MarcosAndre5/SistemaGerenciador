@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Produtos</h3>
			<a href="produto/create">
				<button class="btn btn-success">
					Adicionar Novo Produto
					<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
			</a>
			@include('estoque.produto.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nome</th>
						<th>Código</th>
						<th>Categoria</th>
						<th>Estoque</th>
						<th>Estado</th>
						<th>Imagem</th>
						<th>Opções</th>
					</thead>
	               	@foreach ($produtos as $produto)
						<tr>
							<td>{{ $produto->idproduto }}</td>
							<td>{{ $produto->nome }}</td>
							<td>{{ $produto->codigo }}</td>
							<td>{{ $produto->categorias }}</td>
							<td>{{ $produto->estoque }}</td>
							<td>{{ $produto->estado }}</td>
							<td>
								<img src="{{ asset('imagens/produtos/'.$produto->imagem) }}" alt="{{ $produto->nome }}" width="100px" heigth="100px" class="img-thumbnail">
							</td>
							<td>
								<a href="{{URL::action('ProdutoController@edit', $produto->idproduto)}}">
									<button class="btn btn-info">
										Editar
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</button>
								</a>
		                        <a href="" data-target="#modal-delete-{{$produto->idproduto}}" data-toggle="modal">
		                        	<button class="btn btn-danger">
			                        	Excluir
			                        	<i class="fa fa-trash" aria-hidden="true"></i>
			                        </button>
		                        </a>
							</td>
						</tr>
						@include('estoque.produto.modal')
					@endforeach
				</table>
			</div>
			{{$produtos->render()}}
		</div>
	</div>
@stop