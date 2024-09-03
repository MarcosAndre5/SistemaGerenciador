@extends('layouts.admin')

@section('title', 'AÇAÍ DO RIO > USUÁRIOS > Colaborador > Cadastrar Colaborador')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Cadastrar Colaborador</h3>
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

	{!! Form::open(array('url'=>'colaborador', 'method'=>'POST', 'autocomplete'=>'off')) !!}
		{{ Form::token() }}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Nome</label>
					<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Informe o nome do colaborador..." required>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Cargo</label>
					<select name="id_cargo" class="form-control">
						<option value="" selected>Selecione...</option>
						@foreach($cargos as $cargo)
							<option value="{{ $cargo->id }}">{{ $cargo->descricao }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Telefone</label>
					<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Informe o telefone do colaborador..." required>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" placeholder="Informe o email do colaborador..." required>
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Senha</label>
					<input type="password" name="senha" value="{{ old('senha') }}" class="form-control" placeholder="Informe a senha do colaborador..." required>
				</div>
			</div>
		</div>

		<div class="form-group">
			<a class="btn btn-warning" href="{{ url('colaborador') }}" role="button">
				<i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
			</a>
			<button class="btn btn-primary" type="submit">
				<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Colaborador
			</button>
		</div>
	{!!Form::close()!!}
	<script>
		$("#telefone").mask("(99) 99999-9999");
	</script>
@stop
