@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Novo Cliente</h3>
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

	{!!Form::open(array('url'=>'saida/cliente','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="nome" required value="{{old('nome')}}" class="form-control" placeholder="Nome...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="telefone">Telefone</label>
					<input type="text" name="telefone" class="form-control" placeholder="Telefone...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo Documento</label>
					<select name="tipo_documento" class="form-control">
						<option value="CPF">CPF</option>
						<option value="RG">RG </option>
					</select>
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="numero_documento">Número Documento</label>
					<input type="text" name="numero_documento" required value="{{old('numero_documento')}}" class="form-control" placeholder="Número do Documento...">
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="endereco">Endereço</label>
					<input type="text" name="endereco" required value="{{old('endereco')}}" class="form-control" placeholder="Endereço...">
				</div>	
			</div>
		</div>
		
		<div class="form-group">
			<button class="btn btn-primary" type="submit">
				Salvar Cliente
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
			</button>
			<button class="btn btn-danger" type="reset">
				Cancelar
				<i class="fa fa-ban" aria-hidden="true"></i>
			</button>
		</div>
	{!!Form::close()!!}		
@stop
