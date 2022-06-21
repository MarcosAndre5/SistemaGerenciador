<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$saida->id_saida}}">
	{{ Form::Open(array('action'=>array('SaidaController@destroy', $saida->id_saida), 'method'=>'delete')) }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">X</span>
				</button>
				<h4 class="modal-title">Anular Registro de Saída</h4>
			</div>
			<div class="modal-body">
				<p>Confirme se deseja anular o registro <b>{{ $saida->numero_comprovante_saida }}</b> de <b>{{ \Carbon\Carbon::parse($saida->data_hora_saida)->format('d/m/Y') }}</b></p>
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
