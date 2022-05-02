<?php
// Em construção
Route::get('/', function () {
    return view('loading');
});

/* ESTOQUE */
// Categorias
Route::resource('estoque/categoria', 'CategoriaController');
Route::get('estoque/categoria/edit/{id}', 'CategoriaController@edit');
// Produtos
Route::resource('estoque/produto', 'ProdutoController');

/* SAÍDAS */
// Clientes
Route::resource('saida/cliente', 'ClienteController');
// Vendas
//Route::resource('saida/vendas', 'VendasController');

/* ENTRADAS */
// Fornecedor
Route::resource('entrada/fornecedor', 'FornecedorController');
// Compras
Route::resource('entrada/compra', 'EntradaController');