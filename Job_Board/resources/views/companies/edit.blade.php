@extends('layouts.master')

@section('title', 'Editar Empresa')

@section('content')
    <h1>Editar Empresa</h1>
    <form action="{{ route('companies.update', $company) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Atualizar Empresa</button>
    </form>
@endsection