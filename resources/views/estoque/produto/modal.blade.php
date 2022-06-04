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
				<button type="submit" class="btn btn-danger">
					<i class="fa fa-trash" aria-hidden="true"></i>
					Deletar
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
				@if ($produto->imagem_produto)
					<img src="{{ asset('imagens/produtos/'.$produto->imagem_produto) }}" alt="{{ $produto->nome_produto }}" width="70%" class="img-thumbnail">
				@else
					<img src="{{ asset('imagens/produtos/semImagem.jpg') }}" width="70%" class="img-thumbnail">
				@endif
			</div>
			<div class="modal-footer">
				@if ($produto->imagem_produto)
					<a class="btn btn-success" href="{{ url('estoque/produto/editar/'.$produto->id_produto) }}" role="button">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
						Alterar Imagem
					</a>
				@else
					<a class="btn btn-success" href="{{ url('estoque/produto/editar/'.$produto->id_produto) }}" role="button">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
						Cadastrar Imagem
					</a>
				@endif
				<button type="button" class="btn btn-warning" data-dismiss="modal">
					<i class="fa fa-close" aria-hidden="true"></i>
					Fechar
				</button>
			</div>
		</div>
	</div>
</div>
