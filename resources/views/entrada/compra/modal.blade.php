<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$entrada->id_entrada}}">
	{{Form::Open(array('action'=>array('EntradaController@destroy',$entrada->id_entrada),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Cancelar Entrada</h4>
			</div>
			<div class="modal-body">
				<p>Confirme se deseja cancelar a entrada <b>{{ $entrada->id_entrada }}</b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Fechar
					<i class="fa fa-times" aria-hidden="true"></i>
				</button>
				<button type="submit" class="btn btn-primary">
					Confirmar
					<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
				</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>
