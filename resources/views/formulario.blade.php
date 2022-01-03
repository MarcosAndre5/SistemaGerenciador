@if(session()->has('msg'))
	<div class="alert alert-success" role="alert">
		{{ session('msg') }}
	</div>
@elseif(session()->has('erroMsg'))
	<div class="alert alert-danger" role="alert">
		{{ session('erroMsg') }}
	</div>
@endif

<form class="form-horizontal" role="form" method="POST" action="{{ url('/noticia') }}">
	{{ csrf_field() }}
	<div class="form-group">
	<label class="col-sm-2 control-label" for="titulo">Titulo</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" name="titulo" placeholder="Titulo"> </div>
	</div>

	<div class="form-group">
	<label class="col-sm-2 control-label" for="descricao">Descrição</label>
	<div class="col-sm-10">
	<textarea type="text" class="form-control" name="descricao" placeholder="Descrição"> </textarea></div>
	</div>

	<div class="form-group">
	<label class="col-sm-2 control-label" for="imagem">Imagem</label>
	<div class="col-sm-10">
	<input type="file" class="form-control" name="imagem" placeholder="Imagem"></div>
	</div>

	<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
	<button type="submit" class="btn btn-primary">Enviar</button>
	</div></div>
</form>