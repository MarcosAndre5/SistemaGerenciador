{!!Form::open(array('url' => 'entrada/compra', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search'))!!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="buscaTexto" placeholder="Buscar..." value="{{$buscaTexto}}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">
					Buscar Registro de Entrada
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</span>
		</div>
	</div>
{!!Form::close()!!}
