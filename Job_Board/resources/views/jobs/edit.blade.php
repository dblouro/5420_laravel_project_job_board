@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Editar Emprego</h1>
    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $job->title }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" required>{{ $job->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">Localização</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $job->location }}" required>
        </div>

        <div class="form-group">
            <label for="company_id">Empresa</label>
            <select name="company_id" id="company_id" class="form-control" required>
                <option value="" disabled>Selecione uma empresa</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == old('company_id', $job->company_id) ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
            @error('company_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="salary">Salário</label>
            <input type="number" name="salary" id="salary" class="form-control" value="{{ $job->salary }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>
</div>
@endsection

