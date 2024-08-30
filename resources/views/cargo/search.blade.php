{!! Form::open(array('url'=>'cargo', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="palavra" placeholder="Buscar cargo por descrição..." value="{{ $palavra }}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-search" aria-hidden="true"></i> Buscar Cargo
				</button>
			</span>
		</div>
	</div>
{!!Form::close()!!}
