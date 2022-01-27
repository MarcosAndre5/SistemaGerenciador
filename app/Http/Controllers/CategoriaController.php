<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Categoria;
use App\Http\Request\CategoriaFormRequest;
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
                ->where('condicao', '=', '1')
                ->orderBy('idcategoria', 'desc')
                ->paginate(10);

            return view('estoque.categoria.index', ["categorias"=>$categorias, "buscaTexto"=>$query]);
        }
    }

    public function store(){

    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }    
}
