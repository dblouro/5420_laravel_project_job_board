@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Editar Empresa</h1>

    <form action="{{ route('companies.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" required>
        </div>
        <div class="form-group">
            <label for="location">Localização</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $company->location }}">
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control">{{ $company->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
    </form>
</div>
@endsection
