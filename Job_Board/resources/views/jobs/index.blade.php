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
        @foreach ($jobs as $job)
        <div class="job">
            <h3>{{ $job->title }}</h3>
            <p>{{ $job->description }}</p>

            <!-- Formulário para excluir o trabalho -->
            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Tem a certeza que quer excluir este trabalho?');">
                @csrf
                @method('DELETE') <!-- Método DELETE -->
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
        @endforeach
    </tbody>
</table>
@endsection