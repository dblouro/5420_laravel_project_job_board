@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Detalhes do Emprego</h1>
    <p><strong>Título:</strong> {{ $job->title }}</p>
    <p><strong>Descrição:</strong> {{ $job->description }}</p>
    <p><strong>Localização:</strong> {{ $job->location }}</p>
    <p><strong>Salário:</strong> {{ $job->salary ? '€' . $job->salary : 'Não especificado' }}</p>
    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
