@extends('accueil.base')

@section('content')

<style>
    .text-animation .animated-title {
        font-size: 3rem;
        font-weight: bold;
        text-transform: uppercase;
        color: #fff;
        animation: colorChange 3s infinite, fadeIn 1s ease-in-out;
    }

    @keyframes colorChange {
        0% { color: #ff4757; }
        25% { color: #ffa502; }
        50% { color: #2ed573; }
        75% { color: #1e90ff; }
        100% { color: #ff6b81; }
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Styles du header existants... */
    header.masthead {
        position: relative;
        z-index: 1;
        min-height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    /* Styles existants pour le carousel... */

    /* Nouveaux styles pour la pagination */
    .voting-container {
        min-height: 100vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
        padding: 2rem 0;
    }

    .vote-page {
        display: none;
        opacity: 0;
        transform: translateX(100px);
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .vote-page.active {
        display: block;
        opacity: 1;
        transform: translateX(0);
    }

    .vote-page.slide-left {
        transform: translateX(-100px);
        opacity: 0;
    }

    .vote-page.slide-right {
        transform: translateX(100px);
        opacity: 0;
    }

    .page-header {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 3rem;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .page-subtitle {
        color: #7f8c8d;
        font-size: 1.2rem;
        margin-bottom: 0;
    }

    .candidate-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        margin-bottom: 2rem;
        border: 2px solid transparent;
    }

    .candidate-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    }

    .candidate-card.voted {
        border-color: #28a745;
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(255, 255, 255, 0.95));
    }

    .voted-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #28a745;
        color: white;
        padding: 8px 15px;
        border-radius: 25px;
        font-size: 0.8rem;
        font-weight: bold;
        z-index: 2;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .candidate-image {
        position: relative;
        overflow: hidden;
    }

    .candidate-image img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .candidate-card:hover .candidate-image img {
        transform: scale(1.1);
    }

    .candidate-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.7));
        display: flex;
        align-items: end;
        padding: 20px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .candidate-card:hover .candidate-overlay {
        opacity: 1;
    }

    .overlay-text {
        color: white;
        font-size: 1.3rem;
        font-weight: bold;
        text-transform: uppercase;
    }

    .candidate-body {
        padding: 2rem;
    }

    .candidate-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .candidate-programme {
        color: #7f8c8d;
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .btn-voter {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        color: white;
        padding: 15px 30px;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    .btn-voter:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    }

    .btn-voter:disabled {
        background: #95a5a6;
        cursor: not-allowed;
    }

    .navigation-controls {
        position: fixed;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 15px 25px;
        border-radius: 50px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 20px;
        z-index: 1000;
    }

    .nav-btn {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        font-size: 1.2rem;
    }

    .nav-btn:hover:not(:disabled) {
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .nav-btn:disabled {
        background: #bdc3c7;
        cursor: not-allowed;
        transform: scale(0.9);
    }

    .page-counter {
        background: #2c3e50;
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .progress-bar-container {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: rgba(255, 255, 255, 0.2);
        z-index: 1001;
    }

    .progress-bar {
        height: 100%;
        background: linear-gradient(90deg, #667eea, #764ba2);
        transition: width 0.6s ease;
        border-radius: 0 2px 2px 0;
    }

    .auth-message {
        background: rgba(231, 76, 60, 0.1);
        border: 2px solid #e74c3c;
        color: #c0392b;
        padding: 15px 25px;
        border-radius: 15px;
        text-align: center;
        font-weight: 600;
        margin-top: 1rem;
    }

    /* Styles pour les modals existantes... */
    .modal-content {
        border-radius: 20px;
        border: none;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .modal-header {
        border-bottom: none;
        border-radius: 20px 20px 0 0;
    }

    .modal-footer {
        border-top: none;
        border-radius: 0 0 20px 20px;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }

        .candidate-card {
            margin-bottom: 1.5rem;
        }

        .navigation-controls {
            bottom: 20px;
            padding: 10px 20px;
        }

        .nav-btn {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
    }
</style>

<style>
    .text-animation .animated-title {
        font-size: 3rem;
        font-weight: bold;
        text-transform: uppercase;
        color: #fff;
        animation: colorChange 3s infinite, fadeIn 1s ease-in-out;
    }

    @keyframes colorChange {
        0% {
            color: #ff4757;
        }

        25% {
            color: #ffa502;
        }

        50% {
            color: #2ed573;
        }

        75% {
            color: #1e90ff;
        }

        100% {
            color: #ff6b81;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }





    header.masthead {
        position: relative;
        z-index: 1;
        min-height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }


    #backgroundCarousel {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .carousel-inner {
        width: 100%;
        height: 100%;
    }

    .carousel-item {
        height: 100vh;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.6;
    }


    .carousel-caption {
        position: absolute;
        bottom: 20%;
        left: 10%;
        color: white;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        text-align: left;
    }


    .masthead .container {
        position: relative;
        z-index: 1;
    }

    .masthead-avatar {
        max-width: 150px;
        border-radius: 50%;
    }

    .masthead-heading {
        font-size: 2.5rem;
        text-transform: uppercase;
    }

    .divider-custom {
        margin: 1.5rem 0;
    }

    .divider-custom-line {
        background-color: white;
        height: 1px;
        width: 100px;
    }

    .divider-custom-icon {
        color: white;
        font-size: 2rem;
    }




    .animated-text {
        margin-top: -100px;
        font-size: 2rem;
        color: white;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        font-weight: bold;
        white-space: nowrap;
        overflow: hidden;
        border-right: 2px solid white;
        width: 0;
        animation: typing 5s steps(40, end), blink 0.7s step-end infinite alternate;
    }

    @keyframes typing {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }

    @keyframes blink {
        from {
            border-right-color: white;
        }

        to {
            border-right-color: transparent;
        }
    }








    .modal-content {
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    .modal-dialog-centered {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-body img {
        transition: transform 0.3s ease;
    }

    .modal-body img:hover {
        transform: scale(1.1);
    }

    .modal-footer .btn {
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .modal-footer .btn:hover {
        transform: scale(1.05);
    }


    .modal-header {
        border-bottom: none;
    }


    .modal-footer {
        border-top: none;
    }





    #vote {
        background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
        padding: 50px 0;
        position: relative;
        overflow: hidden;
    }

    .page-section-heading {
        font-family: 'Roboto', sans-serif;
        font-weight: 700;
        text-transform: uppercase;
        color: #0056b3;
        margin-bottom: 40px;
        font-size: 2.5rem;
        position: relative;
        animation: fadeInUp 1s ease-out;
    }

    .page-section-heading strong {
        color: #007bff;
    }

    .candidate-card {
        border-radius: 15px;
        transition: transform 0.4s ease, box-shadow 0.4s ease, background-color 0.4s ease;
        background-color: #fff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .candidate-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        background-color: #f1f1f1;
    }

    .candidate-card .position-relative {
        overflow: hidden;
        border-radius: 15px 15px 0 0;
    }

    .candidate-card img {
        transition: transform 0.3s ease;
    }

    .candidate-card:hover img {
        transform: scale(1.1);
    }

    .candidate-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 15px 15px 0 0;
    }

    .candidate-card:hover .candidate-overlay {
        opacity: 1;
    }

    .candidate-overlay h5 {
        font-size: 1.5rem;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeInUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .card-body {
        padding: 20px;
    }

    .card-body h5 {
        font-size: 1.25rem;
        color: #333;
    }

    .card-body p {
        font-size: 1rem;
        color: #777;
    }

    .btn-voter {
        background: #28a745;
        border: none;
        padding: 12px 25px;
        font-size: 1rem;
        font-weight: bold;
        transition: background 0.3s ease, transform 0.3s ease;
        margin-top: 15px;
    }

    .btn-voter:hover {
        background: #218838;
        transform: scale(1.05);
    }


    section {
        margin-bottom: 80px;
        padding-bottom: 50px;
    }

    @keyframes slideIn {
        0% {
            transform: translateX(100px);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .row>.col-md-6,
    .row>.col-lg-4 {
        animation: slideIn 1s ease-out;
    }

    @media (max-width: 768px) {
        .page-section-heading {
            font-size: 2rem;
        }

        .candidate-card img {
            height: 200px;
        }

        .btn-voter {
            width: 100%;
        }
    }



    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .page-section {
        animation: fadeInUp 1s ease-out;
        opacity: 0;
        transition: opacity 0.5s ease-in;
    }

    .page-section.revealed {
        opacity: 1;
    }

    .section-divider {
        width: 80px;
        height: 5px;
        background-color: #0056b3;
        margin: 20px auto;
        border-radius: 50px;
    }

    .btn-voter {
        background: linear-gradient(90deg, #28a745, #20c997);
        position: relative;
        overflow: hidden;
    }

    .btn-voter::after {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 200%;
        height: 100%;
        background: rgba(255, 255, 255, 0.3);
        transform: skewX(-45deg);
        transition: left 0.5s;
        z-index: 1;
    }

    .btn-voter:hover::after {
        left: 100%;
    }

    .candidate-card {
        transition: transform 0.5s, box-shadow 0.5s;
    }

    .candidate-card:hover {
        transform: translateY(-15px) rotateZ(1deg);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
    }
</style>

<header class="masthead bg-primary text-white text-center position-relative">
    <div id="backgroundCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('assets/img1.jpeg') }}" alt="image 1"
                    style="height: 100vh; object-fit: cover; opacity: 0.6;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/img2.jpeg') }}" alt="image 2"
                    style="height: 100vh; object-fit: cover; opacity: 0.6;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/img4.jpeg') }}" alt="image 3"
                    style="height: 100vh; object-fit: cover; opacity: 0.6;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/img5.jpeg') }}" alt="image 3"
                    style="height: 100vh; object-fit: cover; opacity: 0.6;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/img6.jpeg') }}" alt="image 3"
                    style="height: 100vh; object-fit: cover; opacity: 0.6;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/img8.jpeg') }}" alt="image 3"
                    style="height: 100vh; object-fit: cover; opacity: 0.6;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/img10.jpeg') }}" alt="image 3"
                    style="height: 100vh; object-fit: cover; opacity: 0.6;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/img11.jpeg') }}" alt="image 3"
                    style="height: 100vh; object-fit: cover; opacity: 0.6;">
            </div>

        </div>
    </div>


    <div class="container d-flex align-items-center flex-column position-relative">
        <div class="animated-text">
            <h1 id="typewriter"></h1>
        </div>
        <div class="text-animation mb-5">
            <h1 class="animated-title">VOTE BDE</h1>
        </div>
        <h1 class="masthead-heading text-uppercase mb-0">Votez pour votre Candidat BDE</h1>
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <p class="masthead-subheading font-weight-light mb-0">Votre voix compte !</p>
    </div>

</header>

<!-- Barre de progression -->
<div class="progress-bar-container">
    <div class="progress-bar" id="progressBar"></div>
</div>

{{-- afficher le contenu que si l'utilisateur est connecté --}}
@auth
<!-- Container principal pour les pages de vote -->
<div class="voting-container">
    <div class="container">
        @foreach ($postes as $index => $poste)
        <div class="vote-page @if($index == 0) active @endif" data-poste="{{ $poste->id }}">
            <div class="page-header">
                <h1 class="page-title">{{ $poste->name }}</h1>
                <p class="page-subtitle">Choisissez votre candidat pour ce poste</p>
            </div>

            <div class="row justify-content-center">
                @foreach ($poste->candidates as $candidat)
                <div class="col-md-6 col-lg-4">
                    @php
                        // Vérifier si l'utilisateur a déjà voté pour ce poste
                        $hasVoted = false;
                        $votedForThisCandidate = false;
                        if (Auth::check()) {
                            $existingVote = \App\Models\Vote::where('user_id', Auth::id())
                                                           ->where('poste_id', $poste->id)
                                                           ->first();
                            if ($existingVote) {
                                $hasVoted = true;
                                $votedForThisCandidate = $existingVote->candidate_id == $candidat->id;
                            }
                        }
                    @endphp

                    <div class="candidate-card @if($votedForThisCandidate) voted @endif">
                        @if($votedForThisCandidate)
                        <div class="voted-badge">
                            <i class="fas fa-check"></i> Voté
                        </div>
                        @endif

                        <div class="candidate-image">
                            <img src="{{ asset('storage/' . $candidat->photo) }}" alt="{{ $candidat->name }}">
                            <div class="candidate-overlay">
                                <div class="overlay-text">{{ $candidat->name }}</div>
                            </div>
                        </div>

                        <div class="candidate-body">
                            <h3 class="candidate-name">{{ $candidat->name }}</h3>
                            <p class="candidate-programme">{{ $candidat->programme }}</p>

                            @auth
                                @if($hasVoted)
                                    @if($votedForThisCandidate)
                                    <button class="btn btn-voter" disabled>
                                        <i class="fas fa-check me-2"></i>Vote enregistré
                                    </button>
                                    @else
                                    <button class="btn btn-voter" disabled>
                                        Vous avez déjà voté
                                    </button>
                                    @endif
                                @else
                                <button class="btn btn-voter" data-id="{{ $candidat->id }}" data-poste-id="{{ $poste->id }}" data-candidate-name="{{ $candidat->name }}">
                                    Voter pour {{ $candidat->name }}
                                </button>
                                @endif
                            @endauth

                            @guest
                            <button class="btn btn-voter" disabled>
                                Connectez-vous pour voter
                            </button>
                            <div class="auth-message">
                                Vous devez être connecté pour voter
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

    <!-- Contrôles de navigation -->
    <div class="navigation-controls">
        <button class="nav-btn" id="prevBtn">
            <i class="fas fa-chevron-left"></i>
        </button>
        <div class="page-counter">
            <span id="currentPage">1</span> / <span id="totalPages">{{ count($postes) }}</span>
        </div>
        <button class="nav-btn" id="nextBtn">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>
@endauth
<!-- Modals existantes avec styles améliorés -->
<div class="modal fade" id="confirmVoteModal" tabindex="-1" aria-labelledby="confirmVoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="confirmVoteModalLabel">Confirmer votre vote</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="fs-5">Voulez-vous vraiment voter pour <span id="candidateName" class="fw-bold"></span> ?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" id="confirmVoteButton" class="btn btn-primary">Confirmer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alreadyVotedModal" tabindex="-1" aria-labelledby="alreadyVotedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title w-100" id="alreadyVotedModalLabel">Action non autorisée</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-times-circle text-danger mb-3" style="font-size: 4rem;"></i>
                <p class="fs-5">Vous avez déjà voté pour ce poste.</p>
                <p class="text-muted">Un seul vote par poste est autorisé par personne.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successVoteModal" tabindex="-1" aria-labelledby="successVoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title w-100" id="successVoteModalLabel">Vote enregistré</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('assets/felicitation.jpg') }}" alt="Félicitations"
                    class="img-fluid mb-3 rounded-circle shadow" style="max-width: 120px;">
                <p class="fs-5">Félicitations, <span style="color: #0056b3"> </span> <strong id="voterName"></strong> !
                </p>
                <p class="text-muted">Votre vote a été enregistré avec succès.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="successVoteModal" tabindex="-1" aria-labelledby="successVoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow text-center">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title w-100" id="successVoteModalLabel">Vote enregistré</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('assets/felicitation.jpg') }}" alt="Félicitations"
                    class="img-fluid mb-3 rounded-circle shadow" style="max-width: 120px;">
                <p class="fs-5">Félicitations, <span style="color: #0056b3"> </span> <strong id="voterName"></strong> !
                </p>
                <p class="text-muted">Votre vote a été enregistré avec succès.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div> --}}

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Script typewriter existant
        const text = "Bienvenue sur le site de vote d'élection BDE 2024-2025";
        const typewriterElement = document.getElementById("typewriter");

        let index = 0;
        function typeWriterEffect() {
            if (index < text.length) {
                typewriterElement.textContent += text.charAt(index);
                index++;
                setTimeout(typeWriterEffect, 100);
            }
        }

        typeWriterEffect();

        // Nouvelle classe de pagination
        class VotingPagination {
            constructor() {
                this.currentPage = 1;
                this.totalPages = document.querySelectorAll('.vote-page').length;
                this.pages = document.querySelectorAll('.vote-page');
                this.prevBtn = document.getElementById('prevBtn');
                this.nextBtn = document.getElementById('nextBtn');
                this.currentPageSpan = document.getElementById('currentPage');
                this.progressBar = document.getElementById('progressBar');

                this.init();
            }

            init() {
                this.updateNavigation();
                this.updateProgressBar();

                // Event listeners pour navigation
                this.prevBtn.addEventListener('click', () => this.previousPage());
                this.nextBtn.addEventListener('click', () => this.nextPage());

                // Navigation au clavier
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') this.previousPage();
                    if (e.key === 'ArrowRight') this.nextPage();
                });

                // Initialiser les boutons de vote
                this.initVoteButtons();
            }

            showPage(pageNumber) {
                const currentActivePage = document.querySelector('.vote-page.active');
                if (currentActivePage) {
                    currentActivePage.classList.remove('active');
                    currentActivePage.classList.add(pageNumber > this.currentPage ? 'slide-left' : 'slide-right');

                    setTimeout(() => {
                        currentActivePage.classList.remove('slide-left', 'slide-right');
                    }, 600);
                }

                setTimeout(() => {
                    const newActivePage = this.pages[pageNumber - 1];
                    newActivePage.classList.add('active');
                    newActivePage.classList.remove('slide-left', 'slide-right');
                }, 100);

                this.currentPage = pageNumber;
                this.updateNavigation();
                this.updateProgressBar();
            }

            nextPage() {
                if (this.currentPage < this.totalPages) {
                    this.showPage(this.currentPage + 1);
                }
            }

            previousPage() {
                if (this.currentPage > 1) {
                    this.showPage(this.currentPage - 1);
                }
            }

            updateNavigation() {
                this.currentPageSpan.textContent = this.currentPage;
                this.prevBtn.disabled = this.currentPage === 1;
                this.nextBtn.disabled = this.currentPage === this.totalPages;
            }

            updateProgressBar() {
                const progress = (this.currentPage / this.totalPages) * 100;
                this.progressBar.style.width = `${progress}%`;
            }

            initVoteButtons() {
                document.querySelectorAll('.btn-voter:not([disabled])').forEach(button => {
                    button.addEventListener('click', (e) => {
                        const candidateId = e.target.getAttribute('data-id');
                        const posteId = e.target.getAttribute('data-poste-id');
                        const candidateName = e.target.getAttribute('data-candidate-name');

                        this.showVoteModal(candidateId, posteId, candidateName, e.target);
                    });
                });
            }

            showVoteModal(candidateId, posteId, candidateName, buttonElement) {
                document.getElementById('candidateName').textContent = candidateName;
                const confirmModal = new bootstrap.Modal(document.getElementById('confirmVoteModal'));
                confirmModal.show();

                document.getElementById('confirmVoteButton').onclick = () => {
                    this.processVote(candidateId, posteId, candidateName, buttonElement, confirmModal);
                };
            }

            processVote(candidateId, posteId, candidateName, buttonElement, confirmModal) {
                fetch('/vote', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        candidat_id: candidateId,
                        poste_id: posteId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    confirmModal.hide();

                    if (data.success) {
                        // Marquer comme voté
                        const card = buttonElement.closest('.candidate-card');
                        card.classList.add('voted');

                        // Ajouter le badge
                        const badge = document.createElement('div');
                        badge.className = 'voted-badge';
                        badge.innerHTML = '<i class="fas fa-check"></i> Voté';
                        card.querySelector('.candidate-image').appendChild(badge);

                        // Modifier le bouton
                        buttonElement.innerHTML = '<i class="fas fa-check me-2"></i>Vote enregistré';
                        buttonElement.disabled = true;

                        // Désactiver les autres boutons du même poste
                        const currentPage = card.closest('.vote-page');
                        currentPage.querySelectorAll('.btn-voter:not([disabled])').forEach(btn => {
                            if (btn !== buttonElement) {
                                btn.innerHTML = 'Vous avez déjà voté';
                                btn.disabled = true;
                            }
                        });

                        // Afficher le modal de succès
                        document.getElementById('voterName').innerText = data.voter_name;
                        const successModal = new bootstrap.Modal(document.getElementById('successVoteModal'));
                        successModal.show();

                        // Auto-navigation après 3 secondes
                        setTimeout(() => {
                            successModal.hide();
                            if (this.currentPage < this.totalPages) {
                                this.nextPage();
                            }
                        }, 3000);

                    } else if (data.showModal) {
                        const alreadyVotedModal = new bootstrap.Modal(document.getElementById('alreadyVotedModal'));
                        alreadyVotedModal.show();
                    } else {
                        alert(data.message || "Une erreur est survenue.");
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert("Une erreur est survenue. Veuillez réessayer.");
                    confirmModal.hide();
                });
            }
        }

        // Initialiser la pagination
        new VotingPagination();
    });
</script>

@endsection
