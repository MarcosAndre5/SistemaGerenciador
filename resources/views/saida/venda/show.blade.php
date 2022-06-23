@extends('layouts.admin')

@section('title', 'Saídas > Registro de Saídas > DETALHAMENTO SAÍDA')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nome">Fornecedor</label>
				<p>{{ $saida->nome_fornecedor }}</p>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Tipo Comprovante</label>
				<p>{{ $saida->tipo_comprovante_saida }}</p>
			</div>
		</div>
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="num_doc">Série Comprovante</label>
				<p>{{ $saida->serie_comprovante_saida }}</p>
			</div>
		</div>
			
		<div class="col-lg-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="num_doc">Número Comprovante</label>
				<p>{{ $saida->numero_comprovante_saida }}</p>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Produto</th>
							<th>Quantidade</th>
							<th>Preço de Compra</th>
							<th>Preço de Venda</th>
							<th>Total Compra</th>
						</thead>
						<tbody>
							@foreach ($informacoes as $info)
								<tr>
									<td>{{ $info->produto }}</td>
									<td>{{ $info->quantidade_informacoesSaida }}</td>
									<td>{{ $info->desconto_informacoesSaida }}</td>
									<td>{{ $info->valor_saida_informacoesSaida }}</td>
									<td>{{ $info->total_saida }}</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th id="campoTotal">{{ $saida->total }}</th>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<a class="btn btn-warning" href="{{ url('saida/venda') }}" role="button">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>
					Retornar
				</a>
			</div>
		</div>
	</div>
@stop
