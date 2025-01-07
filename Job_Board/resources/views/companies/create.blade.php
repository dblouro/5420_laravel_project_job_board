@extends('layouts.master')

@section('title', 'Criar Nova Empresa')

@section('content')
    <h1>Criar Nova Empresa</h1>
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Criar Empresa</button>
    </form>
@endsection