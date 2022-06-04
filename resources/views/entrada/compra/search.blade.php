{!! Form::open(array('url'=>'entrada/compra', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="buscaTexto" placeholder="Buscar Registro de Entrada por Número de Comprovante..." value="{{ $buscaTexto }}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-search" aria-hidden="true"></i>
					Buscar Registro de Entrada
				</button>
			</span>
		</div>
	</div>
{!! Form::close() !!}
