@extends('layouts.master')

@section('title', 'Vagas de Emprego')

@section('content')
    <h1>Vagas de Emprego</h1>
    <a href="{{ route('jobs.create') }}" class="btn btn-primary">Adicionar Nova Vaga</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
                <tr>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->description }}</td>
                    <td>
                        <a href="{{ route('jobs.edit', $job) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('jobs.destroy', $job) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection