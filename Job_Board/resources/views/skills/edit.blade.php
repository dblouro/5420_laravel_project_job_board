@extends('layouts.master')

@section('title', 'Editar Habilidade')

@section('content')
    <h1>Editar Habilidade</h1>
    <form action="{{ route('skills.update', $skill) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ $skill->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Atualizar Habilidade</button>
    </form>
@endsection