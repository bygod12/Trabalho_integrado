@extends('layouts.main')

@section('title', 'Dasboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas Fichas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (is_countable($fichas) && count($fichas) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fichas as $ficha)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/events/{{ $ficha->id }}">{{ $ficha->title }}</a></td>
                        <td>{{ count($ficha->users) }}</td>
                        <td>
                            <a href="/events/edit/{{ $ficha->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                            <form action="/events/{{ $ficha->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você ainda não tem Ficha, <a href="/ficha/create">criar ficha</a></p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Ficha que estou participando</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
@if(is_countable($fichasasparticipant) && count($fichasasparticipant) > 0)
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Participantes</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fichasasparticipant as $ficha)
            <tr>
                <td scropt="row">{{ $loop->index + 1 }}</td>
                <td><a href="/events/{{ $ficha->id }}">{{ $ficha->title }}</a></td>
                <td>{{ count($ficha->users) }}</td>
                <td>
                    <form action="/events/leave/{{ $ficha->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>
                            Sair do ficha
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
<p>Você ainda não está participando de nenhum ficha, <a href="/">veja todos os Ficha</a></p>
@endif
</div>
@endsection
