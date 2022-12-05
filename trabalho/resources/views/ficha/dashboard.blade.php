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
                    <th scope="col">titulo</th>
                    <th scope="col">data inicio</th>
                    <th scope="col">data final</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fichas as $ficha)
                    <tr>
                        <td>{{ $ficha->title }}</td>
                        <td>{{ $ficha->ficdata_inicio }}</td>
                        <td>{{ $ficha->ficdata_final }}</td>
                        <td>
                            <form action="/ficha/delete/{{ $ficha->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/ficha/create">criar ficha</a>
    @else
        <p>Você ainda não tem Ficha, <a href="/ficha/create">criar ficha</a></p>
    @endif
    <a href="/ficha/create">criar ficha</a>
</div>

@endsection
