<?php

namespace App\Http\Controllers;


use App\Models\ficha;
use App\Models\tipo_treino;
use Illuminate\Http\Request;
use App\Models\exercicio;
use App\Models\treino;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class treinoController extends Controller
{
    public function store(Request $request, $id) {

        $treino = new treino;
        $treino->treagrupamento_muscular = $request->treagrupamento_muscular;
        $treino->treduracao_esperada = $request->treduracao_esperada;
        $treino->tipnome = $request->tiponome;
        $treino->tipdescricao = $request->tipdescricao;

        $ficha_id = substr($id, 1, 1);

        $treino->ficha_id = $ficha_id;


        $treino->save();



        for ($i = 0; $i < count($request->exenum_serie); $i++) {

            if (
                $request->exenum_serie[$i] != "" &&
                $request->exenome[$i] != "" &&
                $request->exenum_repeticao[$i] != ""
            ) {

                $exercicio = new exercicio;
                $exercicio->exenum_serie = $request->exenum_serie[$i];
                $exercicio->exenome = $request->exenome[$i];
                $exercicio->exenum_repeticao = $request->exenum_repeticao[$i];
                $exercicio->treino_id = $treino->id;

                $exercicio->save();
            }

            return redirect('/ficha/{'.$ficha_id.'}');
        }

    }

    public function destroy($id,$treino_id) {

        treino::findOrFail($treino_id)->delete();

        $ficha_id = substr($id, 1, 1);
        $str = 'ficha_id';
        $treinos = DB::table('treino')->where($str ,$ficha_id)->get();



        return view('ficha.create_treino',['treinos' =>$treinos, 'id'=>$id]);

    }
    public function edit($id,$treino_id) {


        $treinoedit = treino::findOrFail($id);
        $str = 'treino_id';
        $exerciciosedit = DB::table('exercicio')->where($str ,$treinoedit->id)->get();



        return view('ficha.edit', ['treinoedit' => $treinoedit,'id' => $id, 'treino_id' =>$treino_id,'exerciciosedit' =>$exerciciosedit]);

    }
    public function update(Request $request,$id, $treino_id)
    {
        $data = $request->all();
        treino::findOrFail($request->id)->update($data);

        $ficha_id = substr($id, 1, 1);
        $str = 'ficha_id';
        $treinos = DB::table('treino')->where($str ,$ficha_id)->get();

        return view('ficha.create_treino',['treinos' =>$treinos, 'id'=>$id]);


    }
}
