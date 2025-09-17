@extends("dashbase")

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Liste des utilisateurs</h1>

        {{-- <div class="mb-3">
            <a href="{{ route('candidates.create') }}" class="btn btn-primary">Ajouter un candidat</a>
        </div> --}}

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">email</th>
                    <th>Mot de passe</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>password{{ $user->id-1 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
