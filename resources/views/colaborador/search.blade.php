{!! Form::open(array('url'=>'colaborador', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="palavra" placeholder="Buscar colaborador por nome..." value="{{ $palavra }}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-search" aria-hidden="true"></i> Buscar Colaborador
				</button>
			</span>
		</div>
	</div>
{!!Form::close()!!}
