@extends('layouts.master')

@section('title', 'Editar Vaga')

@section('content')
    <h1>Editar Vaga</h1>
    <form action="{{ route('jobs.update', $job) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" class="form-control" value="{{ $job->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" class="form-control" required>{{ $job->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="company_id">Empresa</label>
            <select name="company_id" class="form-control" required>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $job->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</ option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Atualizar Vaga</button>
    </form>
@endsection