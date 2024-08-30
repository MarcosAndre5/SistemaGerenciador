@extends('layouts.admin')

@section('title', 'AÇAÍ DO RIO > USUÁRIOS > Cargo > Editar Cargo')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cargo</h3>
			<hr>
			@if(count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>

	{!! Form::model($cargo, ['method'=>'PATCH', 'route'=>['cargo.update', $cargo->id]]) !!}
		{{ Form::token() }}
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					<label>Descricao</label>
					<input type="text" name="descricao" value="{{ $cargo->descricao }}" class="form-control" required>
				</div>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<a class="btn btn-warning" href="{{ url('cargo') }}" role="button">
				<i class="fa fa-arrow-left" aria-hidden="true"></i>
				Voltar
			</a>
			<button class="btn btn-primary" type="submit">
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
				Atualizar Cargo
			</button>
		</div>
	{!!Form::close()!!}
@stop
