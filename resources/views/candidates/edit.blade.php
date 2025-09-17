@extends("dashbase")

@section('content')
    <h1>Modifier un Candidat</h1>
    <form action="{{ route('candidates.update', $candidate) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ $candidate->name }}" required>
        </div>
        <div>
            <label for="programme">Programme</label>
            <textarea name="programme" id="programme" required>{{ $candidate->programme }}</textarea>
        </div>
        <div>
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo">
            @if ($candidate->photo)
                <img src="{{ asset('storage/' . $candidate->photo) }}" alt="Photo du candidat" width="100">
            @endif
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
