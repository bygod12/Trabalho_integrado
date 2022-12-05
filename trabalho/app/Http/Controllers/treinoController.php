<?php

namespace App\Http\Controllers;


use App\Models\tipo_treino;
use Illuminate\Http\Request;
use App\Models\exercicio;
use App\Models\treino;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class treinoController extends Controller
{
    public function store(Request $request, $id) {

        $treino = new treino;
        $treino->treagrupamento_muscular = $request->treagrupamento_muscular;
        $treino->treduracao_esperada = $request->treduracao_esperada;


        $ficha_id = substr($id, 1, 1);
        error_log($ficha_id);

        $treino->ficha_id = $ficha_id;


        $treino->save();


            $tipo_treino = new tipo_treino;

            $tipo_treino->tipnome = $request->tiponome;
            $tipo_treino->tipdescricao = $request->tipdescricao;
            $treino_id = substr($id, 1, 1);
            error_log($treino_id);
            $tipo_treino->treino_id = $treino_id;
            $tipo_treino->save();



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

            return redirect('/ficha/create{'.$ficha_id.'}')->with('msg', 'Evento criado com sucesso!');
        }

    }

    public function destroy($id) {

        treino::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');

    }
    public function edit($id) {


        $treinoedit = treino::findOrFail($id);


        return ['treinoedit' => $treinoedit];

    }
    public function update(Request $request, $fichaid)
    {

        $data = $request->all();

            treino::findOrFail($request->id)->update($data);

            $treinos = DB::table('treino')
            ->join('ficha', 'ficha.id', '=', $fichaid)
            ->select('treagrupamento_muscular', 'treduracao_esperada')
            ->get();
        $tipo_treino = [];
        foreach ($treinos as $key=>$treino) {
            $tipo_treino += DB::table('tipo_treino')
                ->join('treino', 'treino.id', '=', $treino->id[$key])
                ->select('tipnome', 'tipdescricao')
                ->get();
        }
            return redirect('/ficha/{'.$fichaid.'}')->with('msg', 'Treino editado com sucesso!');

    }
}
