@extends('layouts.main')

@section('title', 'Criar ficha')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Crie o seu ficha</h1>
  <form action="/ficha" method="POST" enctype="multipart/form-data">
    <!--  exercicio-->

          <!-- exercicio fim-->

    @csrf
    <div class="form-group">
      <label for="title">ficha:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Titulo da ficha">
    </div>
    <div class="form-group">
      <label for="date">Data inicio do ficha:</label>
      <input type="date" class="form-control" id="dateinit" name="dateinit">
    </div>
    <div class="form-group">
        <label for="date">Data final do ficha:</label>
        <input type="date" class="form-control" id="datefinal" name="datefinal">
      </div>
    <input type="submit" class="btn btn-primary" value="Criar ficha">
  </form>



</div>

@endsection
