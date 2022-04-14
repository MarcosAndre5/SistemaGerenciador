<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$fornecedor->id_fornecedor}}">
	{{Form::Open(array('action'=>array('FornecedorController@destroy',$fornecedor->id_fornecedor),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Apagar Fornecedor</h4>
			</div>
			<div class="modal-body">
				<p>Confirme se deseja apagar a fornecedor <b>{{ $fornecedor->nome_fornecedor }}</b></p>
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
	{{Form::Close()}}
</div>
