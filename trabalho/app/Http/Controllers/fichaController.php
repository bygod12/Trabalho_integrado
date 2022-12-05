<?php

namespace App\Http\Controllers;
use App\Models\tipo_treino;
use App\Models\treino;
use Illuminate\Support\Facades\DB;

use App\Models\ficha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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


        $ficha_id = substr($id, 1, 1);
        $str = 'ficha_id';
        $treinos = DB::table('treino')->where($str ,$ficha_id)->get();



        return view('ficha.create_treino',['treinos' =>$treinos, 'id'=>$id]);
    }

    public function create() {


        return view('ficha.create');
    }
    public function dashboard() {

        $user = auth()->user();

        $fichas = DB::table('ficha')->get();


        return view('ficha.dashboard',
            ['fichas' => $fichas]
        );

    }
    public function destroy($id) {

        ficha::findOrFail($id)->delete();




        return redirect('/dashboard')->with('msg', 'ficha deletada com sucesso');
    }




}
