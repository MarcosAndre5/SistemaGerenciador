<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$entrada->id_entrada}}">
	{{ Form::Open(array('action'=>array('EntradaController@destroy', $entrada->id_entrada), 'method'=>'delete')) }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">X</span>
				</button>
				<h4 class="modal-title">Anular Registro de Entrada</h4>
			</div>
			<div class="modal-body">
				<p>Confirme se deseja anular o registro <b>{{ $entrada->numero_comprovante_entrada }}</b> de <b>{{ \Carbon\Carbon::parse($entrada->data_hora_entrada)->format('d/m/Y') }}</b></p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger">
					<i class="fa fa-trash" aria-hidden="true"></i>
					Anular
				</button>
				<button type="button" class="btn btn-warning" data-dismiss="modal">
					<i class="fa fa-close" aria-hidden="true"></i>
					Cancelar Operação
				</button>
			</div>
		</div>
	</div>
	{{ Form::Close() }}
</div>
