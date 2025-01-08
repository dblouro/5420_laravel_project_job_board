@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Lista de Empregos</h1>

    <!-- Barra de Pesquisa -->
    <form action="{{ route('jobs.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="keyword" class="form-control" placeholder="Pesquisar por título ou descrição" value="{{ request('keyword') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Pesquisar</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('jobs.index') }}" class="btn btn-secondary w-100">Limpar</a>
            </div>
        </div>
    </form>

    <!-- Botão para criar novo emprego -->
    <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Criar Novo Emprego</a>

    <!-- Lista de Empregos -->
    @if ($jobs->isEmpty())
        <p>Não há empregos disponíveis.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->id }}</td>
                        <td>{{ $job->title }}</td>
                        <td>{{ Str::limit($job->description, 50) }}</td> <!-- Limita a descrição a 50 caracteres -->
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


