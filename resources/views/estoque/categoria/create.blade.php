@extends('layouts.admin')

@section('title', 'Estoque > Categoria > CADASTRAR NOVA CATEGORIA')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nova Categoria</h3>
			
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			{!! Form::open(array('url'=>'estoque/categoria', 'method'=>'POST', 'autocomplete'=>'off')) !!}
				{{ Form::token() }}
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="nome" class="form-control" placeholder="Nome da Categoria..." required>
				</div>
				<div class="form-group">
					<label for="descricao">Descrição</label>
					<div class="form-floating">
						<textarea class="form-control" name="descricao" placeholder="Descrição da Categoria..." style="height: 100px; resize: none;"></textarea>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-floppy-o" aria-hidden="true"></i>
						Salvar Categoria
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
