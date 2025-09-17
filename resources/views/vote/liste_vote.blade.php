@extends("dashbase")

@section('content')

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white shadow">
            <div class="card-body text-center">
                <h5 class="card-title">Total des votes</h5>
                <h2>{{ number_format($totalVotes) }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white shadow">
            <div class="card-body text-center">
                <h5 class="card-title">Utilisateurs inscrits</h5>
                <h2>{{ number_format($utilisateursInscrit) }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning text-dark shadow">
            <div class="card-body text-center">
                <h5 class="card-title">Votes en attente</h5>
                <h2>0</h2>
            </div>
        </div>
    </div>
</div>

@foreach ($postes as $poste)
    <section class="page-section bg-light mb-5" id="poste-{{ $poste->id }}">
        <div class="container py-4 shadow-sm rounded bg-white">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-4">
                Résultats pour le poste de <strong style="color: #0056b3">{{ $poste->name }}</strong>
            </h2>
            <div class="row justify-content-center">
                @php
                    $candidatsTries = $poste->candidates->map(function($candidat) use ($poste) {
                        $candidat->totalVotes = $candidat->votes->where('poste_id', $poste->id)->count();
                        return $candidat;
                    });

                    $candidatsTries = $candidatsTries->sortByDesc('totalVotes');
                @endphp

                @foreach ($candidatsTries as $index => $candidat)
                    @php
                        $totalVotesCandidat = $candidat->totalVotes;
                    @endphp
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card candidate-card shadow-lg border-0" style="border-width: 3px;">
                            <div class="position-relative">
                                <img class="card-img-top img-fluid rounded-top" src="{{ asset('storage/' . $candidat->photo) }}" alt="{{ $candidat->name }}" style="height: 250px; object-fit: cover;">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-uppercase mb-2">{{ $candidat->name }}</h5>
                                <p class="card-text text-muted mb-3">{{ $candidat->programme }}</p>
                                <span class="badge bg-primary fs-6">Votes : {{ $totalVotesCandidat }}</span>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endforeach

@endsection
