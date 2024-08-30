<?php

namespace App\Http\Controllers;

use DB;
use App\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller {
    public function index(Request $request) {
        if($request){
			$palavra = trim($request->get('palavra'));
            
            $cargos = Cargo::where('descricao', 'LIKE', '%'.$palavra.'%')->paginate(5);

            return view('cargo.index', compact('palavra', 'cargos'));
        }
    }

    public function create() { return view('cargo.create'); }

    public function store(Request $request) {
        try{
			DB::beginTransaction();

            $cargo = new Cargo;
            $cargo->descricao = $request->get('descricao');
            $cargo->save();

            DB::commit();
		}catch(\Exception $excecao){
			DB::rollback();
            return redirect()->back()
                ->withErrors(['msg' => 'Não foi possível cadastrar o cargo!'])
                ->withInput();
		}
		return redirect()->to('cargo')->with('message', 'Cargo cadastrado com sucesso!');
    }

    public function show($id) { }

    public function edit($id) {
        $cargo = Cargo::findOrFail($id);
        
        return view('cargo.edit', compact('cargo'));
    }

    public function update(Request $request, $id) {
        try{
			DB::beginTransaction();

            $cargo = Cargo::findOrFail($id);
            $cargo->descricao = $request->get('descricao');
            $cargo->update();

            DB::commit();
		}catch(\Exception $excecao){
			DB::rollback();
            return redirect()->back()
                ->withErrors(['msg' => 'Não foi possível cadastrar o cargo!'])
                ->withInput();
		}
		return redirect()->to('cargo')->with('message', 'Cargo cadastrado com sucesso!');
    }

    public function destroy($id) {
        try {
            $cargo = Cargo::findOrFail($id);

            $cargo->delete();
        } catch(\Exception $excecao) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => 'Não foi possível deletar o cargo!']);
        }
        return redirect()->back()->with('message', 'Cargo deletado com sucesso!');
    }
}
