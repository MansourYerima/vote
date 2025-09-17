@extends("dashbase")

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Liste des Candidats</h1>

        <div class="mb-3">
            <a href="{{ route('candidates.create') }}" class="btn btn-primary">Ajouter un candidat</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Programme</th>
                    {{-- <th scope="col">Poste</th>
                    <th scope="col">Nombre de votes</th> --}}
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidat)
                    <tr>
                        <td>{{ $candidat->name }}</td>
                        <td>{{ \Str::limit($candidat->programme, 50) }}...</td>
                        {{-- <td>
                            @if($candidat->postes->isNotEmpty())
                            <ul class="list-unstyled">
                                @foreach($candidat->postes as $poste)
                                    <li>{{ $poste->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">Aucun poste</span>
                        @endif
                        </td> --}}
                        {{-- <td>
                            <span class="badge bg-success">{{ $candidat->votes_count }} votes</span>
                        </td> --}}

                         {{-- <td>
                        {{ $candidat->totalVotes() }} votes
                    </td> --}}

                    {{-- <td>
                        @foreach($candidat->postes as $poste)
                            <p><strong>{{ $poste->name }}</strong>: {{ $candidat->votes->where('poste_id', $poste->id)->count() }} votes</p>
                        @endforeach
                    </td> --}}
                        <td>
                            {{-- <a href="{{ route('candidates.show', $candidate) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('candidates.edit', $candidate) }}" class="btn btn-warning btn-sm">Modifier</a> --}}

                            <form action="{{ route('candidates.destroy', $candidat) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" >Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
