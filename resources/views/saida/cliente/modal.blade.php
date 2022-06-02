<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ $cliente->id_cliente }}">
	{{ Form::Open(array('action'=>array('ClienteController@destroy', $cliente->id_cliente), 'method'=>'delete')) }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">X</span>
				</button>
				<h4 class="modal-title">Deletar Cliente</h4>
			</div>
			<div class="modal-body">
				<p>Confirme se deseja deletar o(a) cliente <b>{{ $cliente->nome_cliente }}</b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<i class="fa fa-ban" aria-hidden="true"></i>
					Cancelar
				</button>
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
					Confirmar
				</button>
			</div>
		</div>
	</div>
	{{ Form::Close() }}
</div>
