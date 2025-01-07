@extends('layouts.master')

@section('title', 'Candidaturas')

@section('content')
    <h1>Candidaturas</h1>
    <a href="{{ route('applications.create') }}" class="btn btn-primary">Adicionar Nova Candidatura</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Vaga</th>
                <th>Candidato</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->job->title }}</td>
                    <td>{{ $application->candidate_name }}</td>
                    <td>
                        <form action="{{ route('applications.destroy', $application) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection