@extends('layouts.admin')

@section('title', 'Estoque > Produto > EDITAR PRODUTO')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Produto: {{ $produto->nome_produto }}</h3>
			
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>

	{!! Form::model($produto, ['method'=>'PATCH', 'route'=>['produto.update', $produto->id_produto], 'files'=>'true']) !!}
		{{ Form::token() }}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="nome" value="{{ $produto->nome_produto }}" class="form-control" placeholder="Nome do Produto..." required>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Categoria</label>
					<select name="idcategoria" class="form-control">
						@foreach ($categorias as $categoria)
							@if ($categoria->id_categoria == $produto->id_categoria)
								<option value="{{ $categoria->id_categoria }}" selected required>
									{{$categoria->nome_categoria}}
								</option>
							@else
								<option value="{{ $categoria->id_categoria }}">
									{{ $categoria->nome_categoria }}
								</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="number" name="codigo" value="{{ $produto->codigo_produto }}" class="form-control" placeholder="Código do Produto..." required>
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="codigo">Preço</label>
					<input type="number" name="preco" value="{{ $produto->preco_produto }}" class="form-control" placeholder="Preço do Produto..." required>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="descricao">Descrição</label>
					<div class="form-floating">
						<textarea class="form-control" name="descricao" value="{{ $produto->descricao_produto }}" placeholder="Descrição do Produto..." style="height: 100px; resize: none;" maxlength="100">{{$produto->descricao_produto}}</textarea>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					@if($produto->imagem_produto)
						<label for="imagem">Atualizar Imagem</label>
						<input type="file" name="imagem" class="form-control" valeu="{{ $produto->imagem_produto }}">
						<a href="" data-target="#modal-imagem" data-toggle="modal">
							<img src="{{ asset('imagens/produtos/'.$produto->imagem_produto) }}" width="150px">
						</a>
						<input class="form-check-input" type="checkbox" name="removerImagem">
						<label class="form-check-label">
							Remover Imagem
						</label>
					@else
						<label for="imagem">Adicionar Imagem</label>
						<input type="file" name="imagem" class="form-control" valeu="{{ $produto->imagem_produto }}">
					@endif
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<button class="btn btn-primary" type="submit">
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
				Atualizar Produto
			</button>
			<a class="btn btn-danger" href="{{ url('estoque/produto') }}" role="button">
				<i class="fa fa-ban" aria-hidden="true"></i>
				Cancelar
			</a>
		</div>
	{!! Form::close() !!}
	@include('estoque.produto.modal')
@stop
