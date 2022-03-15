<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$produto->id_produto}}">
	{{Form::Open(array('action'=>array('ProdutoController@destroy',$produto->id_produto),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Apagar Produto</h4>
			</div>
			<div class="modal-body">
				<p>Confirme se deseja apagar o produto <b>{{ $produto->nome_produto }}</b></p>
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

<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-imagem">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
				<h4>Visualizar Imagem</h4>
			</div>
			<div class="modal-body">
				<img src="{{ asset('imagens/produtos/'.$produto->imagem_produto) }}" alt="{{ $produto->nome_produto }}" width="100%" heigth="100%" class="img-thumbnail">
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" data-dismiss="modal">
					Confirmar
					<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
				</button>
			</div>
		</div>
	</div>
</div>
