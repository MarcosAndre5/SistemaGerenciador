<?php
// Em construção
Route::get('/', function () {
    return view('loading');
});

/* ESTOQUE */
// Categorias
Route::resource('estoque/categoria', 'CategoriaController');
Route::get('estoque/categoria/editar/{id}', 'CategoriaController@edit');

// Produtos
Route::resource('estoque/produto', 'ProdutoController');
Route::get('estoque/produto/editar/{id}', 'ProdutoController@edit');

/* SAÍDAS */
// Clientes
Route::resource('saida/cliente', 'ClienteController');
Route::get('saida/cliente/editar/{id}', 'ClienteController@edit');

/* Vendas */
Route::resource('saida/venda', 'SaidaController');
Route::get('saida/venda/editar/{id}', 'SaidaController@edit');

/* ENTRADAS */
// Fornecedor
Route::resource('entrada/fornecedor', 'FornecedorController');
Route::get('entrada/fornecedor/editar/{id}', 'FornecedorController@edit');

// Compras
Route::resource('entrada/compra', 'EntradaController');
Route::get('entrada/compra/editar/{id}', 'EntradaController@edit');