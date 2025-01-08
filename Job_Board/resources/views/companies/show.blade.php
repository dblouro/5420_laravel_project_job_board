@extends('layouts.master')

@section('content')
<div class="container">
    <h1>{{ $company->name }}</h1>
    <p>{{ $company->website}}</p>
    <p>{{ $company->description }}</p>
    <p><strong>Localização:</strong> {{ $company->address }}</p>

    <h2>Vagas Disponíveis</h2>
    @if ($company->jobs->isEmpty())
        <p>Não há vagas disponíveis para esta empresa.</p>
    @else
        <ul>
            @foreach ($company->jobs as $job)
                <li>
                    <strong>{{ $job->title }}</strong> - 
                    <a href="{{ route('jobs.show', $job->id) }}">Ver detalhes</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
