@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Produto: {{ $produto->nome_produto }}</h3>
			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>

	{!!Form::model($produto, ['method'=>'PATCH', 'route'=>['produto.update', $produto->id_produto], 'files'=>'true'])!!}
		{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="nome" required value="{{$produto->nome_produto}}" class="form-control" placeholder="Nome...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Categoria</label>
					<select name="idcategoria" class="form-control">
						@foreach($categorias as $categoria)
							@if($categoria->id_categoria == $produto->id_categoria)
								<option value="{{$categoria->id_categoria}}" selected>
									{{$categoria->nome_categoria}}
								</option>
							@else
								<option value="{{$categoria->id_categoria}}">
									{{$categoria->nome_categoria}}
								</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text" name="codigo" required value="{{$produto->codigo_produto}}" class="form-control" placeholder="Código do Produto...">
				</div>
			</div>
				
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="estoque">Estoque</label>
					<input type="number" name="estoque" required value="{{$produto->estoque_produto}}" class="form-control" placeholder="Estoque...">
				</div>	
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="descricao">Descrição</label>
					<div class="form-floating">
						<textarea class="form-control" name="descricao" value="{{ $produto->descricao_produto }}" style="height: 100px; resize: none">{{$produto->descricao_produto}}</textarea>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="imagem">Imagem</label>
					<input type="file" name="imagem" class="form-control" valeu="{{ $produto->imagem_produto }}">
					@if($produto->imagem_produto != 'Sem Imagem')
						<img src="{{asset('imagens/produtos/'.$produto->imagem_produto)}}" width="200px">
					@endif
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<button class="btn btn-primary" type="submit">
				Alterar Produto
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
			</button>
			<button class="btn btn-danger" type="reset">
				Cancelar
				<i class="fa fa-ban" aria-hidden="true"></i>
			</button>
		</div>
	{!!Form::close()!!}		
@stop