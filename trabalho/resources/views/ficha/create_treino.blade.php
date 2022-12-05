@extends('layouts.main')

@section('title', 'Criar Treinos da ficha')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Crie os treinos de sua ficha</h1>




    <!-- The Modal -->
    <div class="form-group">
        <button type="button" class="btn btn-primary" id="myBtn">Criar Treino</button>

      <label for="title">Divisão dos treinos:</label>
      <!--Deshboard-->
      <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Minhas Fichas</h1>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-events-container">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Agrupamento Muscular</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Tipo do treino</th>
                        <th scope="col">Duração,em minutos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($treinos as $treino)
                        <tr>
                            <td scropt="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $treino->treagrupamento_muscular }}</td>
                            <td>{{ $treino->tipdescricao }}</td>
                            <td>{{ $treino->tipnome }}</td>
                            <td>{{ $treino->treduracao_esperada }}</td>


                            <td>
                                <form action="/treino/edit/{{ $treino->id }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary update-btn" id="myBtn1"><ion-icon name="create-outline"></ion-icon> Editar</button>

                                </form>


                                <form action="/treino/{{ $treino->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


    </div>

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Ficha que estou participando</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
    </div>
    </div>
    {{--
    @if (is_null($treinoedit) &&
        is_null($exerciciosedit) &&
        is_null($tipo_treinoedit))
    <form action="/treinos" method="POST" enctype="multipart/form-data">
        @csrf

                <!-- The Modal -->
            <div id="myModal1" class="modal1" >
                <!-- Modal content -->
                <div class="modal-content">
                <div class="modal-header">
                    <h2>Editar treino</h2>
                    <span class="close1">&times;</span>

                </div>


                <div class="modal-body">
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

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="inserir">inserir</button>
                </div>
                </div>


            </div>
            <button type="submit" class="btn btn-success" id="inserir">Terminar Ficha!</button>

      </form>
      --}}
      <form action="/treinos/inserir/{{request()->route()->parameters['id']}}" method="POST" enctype="multipart/form-data">
        <script>console.log(dd(request()->route()->parameters['id']));</script>
        @csrf

                <!-- The Modal -->
            <div id="myModal" class="modal" >
                <!-- Modal content -->
                <div class="modal-content">
                <div class="modal-header">
                    <h2>Criar treino</h2>
                    <span class="close">&times;</span>

                </div>


                <div class="modal-body">
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
                                            <input type="text" class="form-control" id="agrupamento" name="treagrupamento_muscular" placeholder="agrupamento muscular">
                                        </th>
                                        <th scope="col">
                                            <input type="text" class="form-control" id="descrição" name="tipdescricao" placeholder="Descrição">

                                        </th>
                                        <th scope="col">
                                            <input type="text" class="form-control" id="tiponome" name="tiponome" placeholder="Ex:A,B,C,D,E">

                                        </th>
                                        <th scope="col">
                                            <input type="number" class="form-control" id="treduracao_esperada" name="treduracao_esperada" placeholder="Em minutos">

                                        </th>


                                    </tr>
                                </thead>



                    </table>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="inserir">inserir</button>
                </div>
                </div>


            </div>
            <button type="submit" class="btn btn-success" id="inserir">Terminar Ficha!</button>

      </form>





</div>

@endsection

