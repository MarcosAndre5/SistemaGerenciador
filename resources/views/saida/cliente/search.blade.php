{!! Form::open(array('url'=>'saida/cliente', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="buscaTexto" placeholder="Buscar Cliente pode Nome ou Número do Documento..." value="{{ $buscaTexto }}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-search" aria-hidden="true"></i>
					Buscar Cliente
				</button>
			</span>
		</div>
	</div>
{!!Form::close()!!}
