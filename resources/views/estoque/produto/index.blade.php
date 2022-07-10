@extends('layouts.admin')

@section('title', 'Estoque > PRODUTO')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Produtos</h3>
			<a href="{{ url('estoque/produto/create') }}">
				<button class="btn btn-success">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Cadastrar Novo Produto
				</button>
			</a>
			<br></br>
			@include('estoque.produto.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Código</th>
						<th>Nome Produto</th>
						<th>Categoria</th>
						<th>Qtd. Estoque</th>
						<th>Preço do Produto</th>
						<th>Imagem</th>
						<th>Opções</th>
					</thead>
					@foreach ($produtos as $produto)
						<tr>
							<td>{{ $produto->codigo_produto }}</td>
							<td>{{ $produto->nome_produto }}</td>
							<td>{{ $produto->categorias }}</td>
							<td>{{ $produto->estoque_produto }}</td>
							<td>{{ $produto->preco_produto }} R$</td>
							<td>
								@if ($produto->imagem_produto)
									<a href="" data-target="#modal-imagem-{{ $produto->id_produto }}" data-toggle="modal">
										<img src="{{ asset('imagens/produtos/'.$produto->imagem_produto) }}" alt="{{ $produto->nome_produto }}" width="50px" heigth="50px" class="img-thumbnail">
									</a>
								@else
									<a href="" data-target="#modal-imagem-{{ $produto->id_produto }}" data-toggle="modal">
										<img src="{{ asset('imagens/produtos/semImagem.jpg') }}" alt="{{ $produto->nome_produto }}" width="50px" heigth="50px" class="img-thumbnail">
									</a>
								@endif
							</td>
							<td>
								<a href="{{ url('estoque/produto/editar/'.$produto->id_produto) }}">
									<button class="btn btn-info">
										<i class="fa fa-pencil" aria-hidden="true"></i>
										Editar Produto
									</button>
								</a>
								<a href="" data-target="#modal-delete-{{ $produto->id_produto }}" data-toggle="modal">
									<button class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
										Deletar Produto
									</button>
								</a>
							</td>
						</tr>
						@include('estoque.produto.modal')
					@endforeach
				</table>
			</div>
			{{ $produtos->render() }}
		</div>
	</div>
@stop
