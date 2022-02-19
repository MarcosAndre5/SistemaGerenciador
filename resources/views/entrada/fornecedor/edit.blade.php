@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Cliente: {{ $cliente->nome_cliente }}</h3>
		@if (count($errors) > 0)
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

	{!!Form::model($cliente, ['method'=>'PATCH', 'route'=>['cliente.update', $cliente->id_cliente]])!!}
		{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="nome" required value="{{$cliente->nome_cliente}}" class="form-control" placeholder="Nome...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo Documento</label>
					<select name="documento" class="form-control">
						<option value="{{$cliente->documento_cliente}}">{{$cliente->documento_cliente}}</option>
						<option value="CPF">CPF</option>
						<option value="RG">RG</option>
						<option value="RG">CNPJ</option>
					</select>
				</div>
			</div>
            	
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="numero_documento">Número Documento</label>
					<input type="text" name="numero_documento" required value="{{$cliente->numero_documento_cliente}}" class="form-control" placeholder="Número do Documento...">
				</div>
			</div>
            		
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="endereco">Endereço</label>
					<input type="text" name="endereco" required value="{{$cliente->endereco_cliente}}" class="form-control" placeholder="Endereço...">
				</div>	
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="telefone">Telefone</label>
					<input type="text" name="telefone" id="telefone" class="form-control" value="{{$cliente->telefone_cliente}}" placeholder="Telefone...">
				</div>
            </div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" value="{{$cliente->email_cliente}}" class="form-control">
				</div>
			</div>
		</div>
           
		<div class="form-group">
			<button class="btn btn-primary" type="submit">
				Alterar Cliente
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
			</button>
			<button class="btn btn-danger" type="reset">
				Cancelar
				<i class="fa fa-ban" aria-hidden="true"></i>
			</button>
		</div>
	{!!Form::close()!!}		
@stop