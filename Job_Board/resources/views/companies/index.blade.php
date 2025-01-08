@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Empresas</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Adicionar Empresa</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Localização</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->location }}</td>
                <td>
                    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info btn-sm">Detalhes</a>
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tens a certeza?')">Apagar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
