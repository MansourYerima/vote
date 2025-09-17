@extends('dashboard')

@section('content')
    <h1>{{ $candidate->name }}</h1>
    <p>{{ $candidate->programme }}</p>
    @if ($candidate->photo)
        <img src="{{ asset('storage/' . $candidate->photo) }}" alt="Photo du candidat" width="200">
    @endif
    <a href="{{ route('candidates.index') }}">Retour à la liste</a>
@endsection
