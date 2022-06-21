{!! Form::open(array('url'=>'saida/vendas', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="buscaTexto" placeholder="Buscar Registro de Saída por Número de Comprovante..." value="{{ $buscaTexto }}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-search" aria-hidden="true"></i>
					Buscar Registro de Saída
				</button>
			</span>
		</div>
	</div>
{!! Form::close() !!}
