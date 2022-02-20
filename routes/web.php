<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Em construção
Route::get('/loading', function () {
    return view('loading');
});

// Categorias
Route::resource('estoque/categoria', 'CategoriaController');

// Produtos
Route::resource('estoque/produto', 'ProdutoController');

// Clientes
Route::resource('saida/cliente', 'ClienteController');

// Fornecedor
Route::resource('entrada/fornecedor', 'FornecedorController');