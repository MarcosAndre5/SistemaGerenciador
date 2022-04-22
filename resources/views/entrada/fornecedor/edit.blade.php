@extends('layouts.admin')

@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Fornecedor: {{ $fornecedor->nome_fornecedor }}</h3>
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

	{!! Form::model($fornecedor, ['method'=>'PATCH', 'route'=>['fornecedor.update', $fornecedor->id_fornecedor]]) !!}
		{{ Form::token() }}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="nome" required value="{{ $fornecedor->nome_fornecedor }}" class="form-control" placeholder="Nome...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="telefone">Telefone</label>
					<input type="text" name="telefone" id="telefone" class="form-control" value="{{ $fornecedor->telefone_fornecedor }}" placeholder="Telefone...">
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo Documento</label>
					<select name="tipo_documento" class="form-control">
						<option value="{{ $fornecedor->documento_fornecedor }}">
							{{ $fornecedor->documento_fornecedor }}
						</option>
						@if($fornecedor->documento_fornecedor != 'CPF')
							<option value="CPF">CP</option>
						@endif
						@if($fornecedor->documento_fornecedor != 'RG')
							<option value="RG">RG</option>
						@endif
						@if($fornecedor->documento_fornecedor != 'CNPJ')
							<option value="CNPJ">CNPJ</option>
						@endif
					</select>
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="numero_documento">Número Documento</label>
					<input type="number" name="numero_documento" required value="{{ $fornecedor->numero_documento_fornecedor }}" class="form-control" placeholder="Número do Documento...">
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" value="{{ $fornecedor->email_fornecedor }}" class="form-control">
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="endereco">Endereço</label>
					<input type="text" name="endereco" required value="{{ $fornecedor->endereco_fornecedor }}" class="form-control" placeholder="Endereço...">
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<button class="btn btn-primary" type="submit">
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
				Alterar Fornecedor
			</button>
			<button class="btn btn-danger" type="reset">
				<i class="fa fa-ban" aria-hidden="true"></i>
				Cancelar
			</button>
		</div>
	{!! Form::close() !!}
@stop
