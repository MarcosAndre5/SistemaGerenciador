<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ $colaborador->id }}">
	{{ Form::Open(array('action'=>array('ColaboradorController@destroy', $colaborador->id), 'method'=>'delete')) }}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-purple">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">X</span>
					</button>
					<h4 class="modal-title">Deletar Colaborador</h4>
				</div>
				<div class="modal-body">
					<p>Confirme se deseja deletar o colaborador <b>{{ $colaborador->name }}</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">
						<i class="fa fa-close" aria-hidden="true"></i> Não, cancelar operação
					</button>
					<button type="submit" class="btn btn-danger">
						<i class="fa fa-trash" aria-hidden="true"></i> Sim, deletar
					</button>
				</div>
			</div>
		</div>
	{{ Form::Close() }}
</div>
