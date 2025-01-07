@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Lista de Empregos</h1>
    <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Criar Novo Emprego</a>
    @if ($jobs->isEmpty())
        <p>Não há empregos disponíveis.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Localização</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->id }}</td>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->location }}</td>
                        <td>
                            <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tens a certeza?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

