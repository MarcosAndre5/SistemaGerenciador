<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$entrada->id_entrada}}">
	{{ Form::Open(array('action'=>array('EntradaController@destroy', $entrada->id_entrada), 'method'=>'delete')) }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">X</span>
				</button>
				<h4 class="modal-title">Cancelar Compra</h4>
			</div>
			<div class="modal-body">
				<p>Confirme se deseja cancelar a compra de <b>{{ \Carbon\Carbon::parse($entrada->data_hora_entrada)->format('d/m/Y') }}</b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<i class="fa fa-times" aria-hidden="true"></i>
					Fechar
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
