@extends('layouts.master')

@section('title', 'Habilidades')

@section('content')
    <h1>Habilidades</h1>
    <a href="{{ route('skills.create') }}" class="btn btn-primary">Adicionar Nova Habilidade</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>
                        <a href="{{ route('skills.edit', $skill) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('skills.destroy', $skill) }}" method="POST" style="display:inline;">
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