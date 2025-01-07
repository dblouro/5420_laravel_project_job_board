@extends('layouts.master')

@section('title', 'Empresas')

@section('content')
    <h1>Empresas</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-primary">Adicionar Nova Empresa</a>

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
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>
                        <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
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