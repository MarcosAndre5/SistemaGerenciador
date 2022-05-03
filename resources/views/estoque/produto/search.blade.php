{!! Form::open(array('url'=>'estoque/produto', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="buscaTexto" placeholder="Buscar Produto por Código ou por Nome..." value="{{ $buscaTexto }}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-search" aria-hidden="true"></i>
					Buscar Produto
				</button>
			</span>
		</div>
	</div>
{!! Form::close() !!}
