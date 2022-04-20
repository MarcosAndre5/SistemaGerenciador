@extends('layouts.admin')

@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Cliente: {{ $cliente->nome_cliente }}</h3>
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

	{!! Form::model($cliente, ['method'=>'PATCH', 'route'=>['cliente.update', $cliente->id_cliente]]) !!}
		{{ Form::token() }}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="nome" required value="{{ $cliente->nome_cliente }}" class="form-control" placeholder="Nome...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="telefone">Telefone</label>
					<input type="text" name="telefone" id="telefone" class="form-control" value="{{ $cliente->telefone_cliente }}" placeholder="Telefone...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo Documento</label>
					<select name="tipo_documento" class="form-control">
						<option value="{{ $cliente->documento_cliente }}">
							{{ $cliente->documento_cliente }}
						</option>
						@if($cliente->documento_cliente != 'CPF')
							<option value="CPF">CPF</option>
						@endif
						@if($cliente->documento_cliente != 'RG')
							<option value="RG">RG</option>
						@endif
						@if($cliente->documento_cliente != 'CNPJ')
							<option value="CNPJ">CNPJ</option>
						@endif
					</select>
				</div>
			</div>
				
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="numero_documento">Número Documento</label>
					<input type="text" name="numero_documento" required value="{{ $cliente->numero_documento_cliente }}" class="form-control" placeholder="Número do Documento...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" value="{{ $cliente->email_cliente }}" class="form-control">
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="endereco">Endereço</label>
					<input type="text" name="endereco" required value="{{ $cliente->endereco_cliente }}" class="form-control" placeholder="Endereço...">
				</div>
			</div>
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type="submit">
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
				Alterar Cliente
			</button>
			<button class="btn btn-danger" type="reset">
				<i class="fa fa-ban" aria-hidden="true"></i>
				Cancelar
			</button>
		</div>
	{!!Form::close()!!}
@stop
