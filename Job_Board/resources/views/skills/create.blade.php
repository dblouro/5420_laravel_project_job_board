@extends('layouts.master')

@section('title', 'Criar Nova Habilidade')

@section('content')
    <h1>Criar Nova Habilidade</h1>
    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Criar Habilidade</button>
    </form>
@endsection