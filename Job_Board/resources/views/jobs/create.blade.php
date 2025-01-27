@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Criar Novo Emprego</h1>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="location">Localização</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="company_id">Empresa</label>
            <select name="company_id" id="company_id" class="form-control" required>
                <option value="" disabled selected>Selecione uma empresa</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
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
            <input type="number" name="salary" id="salary" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
