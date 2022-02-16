@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoria: {{ $categoria->nome_categoria }}</h3>
			
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif

			{!!Form::model($categoria, ['method'=>'PATCH', 'route'=>['categoria.update', $categoria->id_categoria]])!!}
				{{Form::token()}}
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="nome" class="form-control" value="{{ $categoria->nome_categoria }}"placeholder="Nome...">
				</div>
				<div class="form-group">
					<label for="descricao">Descrição</label>
					<input type="text" name="descricao" class="form-control" value="{{ $categoria->descricao_categoria }}" placeholder="Descrição...">
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">
						Atualizar Categoria
						<i class="fa fa-floppy-o" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger" type="reset">
						Cancelar
						<i class="fa fa-ban" aria-hidden="true"></i>
					</button>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@stop
