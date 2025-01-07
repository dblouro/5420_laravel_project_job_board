@extends('layouts.master')

@section('title', 'Criar Nova Candidatura')

@section('content')
    <h1>Criar Nova Candidatura</h1>
    <form action="{{ route('applications.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="job_id">Vaga</label>
            <select name="job_id" class="form-control" required>
                @foreach($jobs as $job)
                    <option value="{{ $job->id }}">{{ $job->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="candidate_name">Nome do Candidato</label>
            <input type="text" name="candidate_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Criar Candidatura</button>
    </form>
@endsection