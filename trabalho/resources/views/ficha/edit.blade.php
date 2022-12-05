@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')

<form action="/treinos/update/{{$id}}/{{$treino_id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

            <!-- The Modal -->
            <!-- Modal content -->
                <h2>Editar treino</h2>


                <table class="table">
                        <thead>
                            <tr>

                                <th scope="col"><button class="btn btn-success" type="button" id="adcionar" class="">Exercicio +</button></th>
                                <th scope="col">Nome</th>
                                <th scope="col">Numero Series</th>
                                <th scope="col">Numero Repetição</th>
                                <td><span class="close">&times;</span></td>

                            </tr>
                        </thead>
                        <tbody id="exercicios" >


                            <tbody id="exercicios" >
                                @foreach ($exerciciosedit as $exercicio)
                                <tr id='x" + verificador + "'>
                                    <th scope='col'><button type='button' id='x" + verificador + "' class='botao btn-success'>X</button></th>
                                    <td><input type='text' class='form-control' name='exenome[]' value="{{$exercicio->exenome}}"></td>
                                    <td><input type='number' class='form-control' name='exenum_serie[]' value="{{$exercicio->exenum_serie}}"></td>
                                    <td><input type='number' class='form-control' name='exenum_repeticao[]' value="{{$exercicio->exenum_repeticao}}"></td>
                                    </tr>
                                @endforeach


                            </tbody>
                                <thead>
                                    <tr>
                                        <th scope="col">Agrupamento muscular:</th>
                                        <th scope="col">Descrição, opcional:</th>
                                        <th scope="col">Tipo do treino:</th>
                                        <th scope="col">Duração esperada do treino:</th>


                                    </tr>
                                    <tr>
                                        <th scope="col">
                                            <input type="text" class="form-control" id="agrupamento" name="treagrupamento_muscular" value="{{$treino->treagrupamento_muscular}}">
                                        </th>
                                        <th scope="col">
                                            <input type="text" class="form-control" id="descrição" name="tipdescricao" value="{{$tipo_treino->tipdescricao}}">

                                        </th>
                                        <th scope="col">
                                            <input type="text" class="form-control" id="tiponome" name="tiponome" value="{{$tipo_treino->tipnome}}">

                                        </th>
                                        <th scope="col">
                                            <input type="number" class="form-control" id="treduracao_esperada" name="treduracao_esperada" value="{{$treino->treduracao_esperada}}">

                                        </th>


                                    </tr>
                                </thead>



                </table>

                <button type="submit" class="btn btn-success" id="inserir">inserir</button>


        <button type="submit" class="btn btn-success" id="inserir">Terminar Ficha!</button>

  </form>

@endsection
