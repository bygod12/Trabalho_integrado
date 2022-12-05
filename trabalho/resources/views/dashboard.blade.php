@extends('layouts.main')

@section('title', 'Dasboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minha fichas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($fichas) > 0)

    @else
    <p>Você ainda não tem fichas, <a href="/events/create">criar ficha</a></p>
    @endif
</div>

@endsection
