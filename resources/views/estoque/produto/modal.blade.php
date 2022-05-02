<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ $produto->id_produto }}">
	{{ Form::Open(array('action'=>array('ProdutoController@destroy', $produto->id_produto), 'method'=>'delete')) }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
					 <span aria-hidden="true">X</span>
				</button>
				<h4 class="modal-title">Deletar Produto</h4>
			</div>
			<div class="modal-body">
				<p>Confirme se deseja apagar o produto <b>{{ $produto->nome_produto }}</b></p>
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

<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-imagem-{{ $produto->id_produto }}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">X</span>
				</button>
				<h4>Imagem do produto <b>{{ $produto->nome_produto }}<b></h4>
			</div>
			<div class="modal-body text-center">
				<img src="{{ asset('imagens/produtos/'.$produto->imagem_produto) }}" alt="{{ $produto->nome_produto }}" width="70%" class="img-thumbnail">
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" data-dismiss="modal">
					<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
					Confirmar
				</button>
			</div>
		</div>
	</div>
</div>
