@extends('layouts.admin')

@section('title', 'Estoque > Categoria > EDITAR CATEGORIA')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoria: {{ $categoria->nome_categoria }}</h3>
			
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			{!! Form::model($categoria, ['method'=>'PATCH', 'route'=>['categoria.update', $categoria->id_categoria]]) !!}
				{{ Form::token() }}
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="nome" class="form-control" value="{{ $categoria->nome_categoria }}" required>
				</div>
				<div class="form-group">
					<label for="descricao">Descrição</label>
					<div class="form-floating">
						<textarea class="form-control" name="descricao" value="{{ $categoria->descricao_categoria }}" placeholder="Descrição da Categoria..." style="height: 100px; resize: none;">{{ $categoria->descricao_categoria }}</textarea>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-floppy-o" aria-hidden="true"></i>
						Atualizar Categoria
					</button>
					<a class="btn btn-danger" href="{{ url('estoque/categoria') }}" role="button">
						<i class="fa fa-ban" aria-hidden="true"></i>
						Cancelar
					</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@stop
