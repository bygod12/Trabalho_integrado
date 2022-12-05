<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\ficha;
use Illuminate\Http\Request;

class fichaController extends Controller
{
    public function store(Request $request) {
        $ficha = new ficha;


        $ficha->title = $request->title;
        $ficha->ficdata_inicio = $request->dateinit;
        $ficha->ficdata_final = $request->datefinal;
        $user = auth()->user();
        $ficha->user_id = $user->id;



        $ficha->save();

//        $treinos = DB::table('treino')
//        ->join('tipo_treino', 'treino.id', '=', 'tipo_treino.treino_id')
//        ->where('ficha_id',$ficha->id)
//        ->groupByRaw('treino.id')
//        ->select('treagrupamento_muscular', 'treduracao_esperada','tipnome','tipdescricao')
//        ->get();

        return redirect('/ficha/{'.$ficha->id.'}')->with('id', $ficha->id);


    }

    public function treino_create($id) {
        $treinos = DB::table('treino')
        ->join('tipo_treino', 'treino.id', '=', 'tipo_treino.treino_id')
        ->where('ficha_id',$id)
        ->select('treagrupamento_muscular', 'treduracao_esperada','tipnome','tipdescricao')
        ->get();
        return view('ficha.create_treino',['treinos' =>$treinos]);
    }

    public function create() {


        return view('ficha.create');
    }




}
