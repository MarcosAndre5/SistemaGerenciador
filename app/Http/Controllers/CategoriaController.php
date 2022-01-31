<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Categoria;
use App\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        if($request){
            $query = trim($request->get('buscaTexto'));
            $categorias = DB::table('categoria')
                ->where('nome', 'LIKE', '%'.$query.'%')
                ->where('condicao', '=', 1)
                ->orderBy('idcategoria', 'desc')
                ->paginate(5);

            return view('estoque.categoria.index', ["categorias"=>$categorias, "buscaTexto"=>$query]);
        }
    }

    public function create(){
        return view('estoque.categoria.create');
    }

    public function store(CategoriaFormRequest $request){
        $categoria = new Categoria;
        
        $categoria->nome = $request->get('nome');
        $categoria->descricao = $request->get('descricao');
        $categoria->condicao = 1;
        
        $categoria->save();

        return Redirect::to('estoque/categoria');
    }

    public function show($id){
        return view("estoque.categoria.show", ["categoria" => Categoria::findOrFail($id)]);
    }

    public function edit($id){
        return view("estoque.categoria.edit", ["categoria" => Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request, $id){
        $categoria = Categoria::findOrFail($id);
        
        $categoria->nome = $request->get('nome');
        $categoria->descricao = $request->get('descricao');
        
        $categoria->update();

        return Redirect::to('estoque/categoria');
    }

    public function destroy($id){
        $categoria = Categoria::findOrFail($id);
        
        $categoria->condicao = '0';
        
        $categoria->update();

        return Redirect::to('estoque/categoria');
    }    
}
