<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Cargo;
use Illuminate\Http\Request;

class ColaboradorController extends Controller {
    public function __construct() { $this->middleware('auth'); }
    
    public function index(Request $request) {
        if($request){
			$palavra = trim($request->get('palavra'));
            $colaboradores = DB::table('users')
                ->join('cargos', 'users.id_cargo', '=', 'cargos.id')
                ->select('users.*', 'cargos.descricao AS cargo')
                ->where('users.name', 'LIKE', '%'.$palavra.'%')
                ->paginate(5);

            return view('colaborador.index', compact('palavra', 'colaboradores'));
        }
    }

    public function create() {
        $cargos = Cargo::orderBy('descricao')->get();

        return view('colaborador.create', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
