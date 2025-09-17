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
                <img class="d-block w-100" src="{{ asset('assets/img3.jpeg') }}" alt="image 3"
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
                <img class="d-block w-100" src="{{ asset('assets/img7.jpeg') }}" alt="image 3"
                    style="height: 100vh; object-fit: cover; opacity: 0.6;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/img8.jpeg') }}" alt="image 3"
                    style="height: 100vh; object-fit: cover; opacity: 0.6;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/img9.jpeg') }}" alt="image 3"
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




@foreach ($postes as $poste)
<section class="page-section bg-light" id="vote">
    <div class="container py-5">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">
            Votez votre
            <strong style="color: #0056b3">{{ $poste->name }}</strong>
        </h2>
        <div class="section-divider"></div>
        <div class="row justify-content-center">
            @foreach ($poste->candidates as $candidat)
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="card candidate-card shadow-lg border-0">
                    <div class="position-relative">
                        <img class="card-img-top img-fluid rounded-top" src="{{ asset('storage/' . $candidat->photo) }}"
                            alt="{{ $candidat->name }}" style="height: 250px; object-fit: cover;">
                        <div class="candidate-overlay d-flex align-items-center justify-content-center">
                            <h5 class="text-white text-uppercase">{{ $candidat->name }}</h5>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-uppercase mb-3">{{ $candidat->name }}</h5>
                        <p class="card-text text-muted mb-4">{{ $candidat->programme }}</p>
                        @auth
                        <button class="btn btn-primary btn-voter shadow-sm" data-id="{{ $candidat->id }}"
                            data-poste-id="{{ $poste->id }}">
                            Voter pour {{ $candidat->name }}
                        </button>
                        @endauth
                        @guest
                        <p class="text-danger">Vous devez être connecté pour voter.</p>
                        @endguest
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endforeach

<!-- Modal de confirmation -->
<div class="modal fade" id="confirmVoteModal" tabindex="-1" aria-labelledby="confirmVoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="confirmVoteModalLabel">Confirmer votre vote</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
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

<!-- Modal pour les votes déjà effectués -->
<div class="modal fade" id="alreadyVotedModal" tabindex="-1" aria-labelledby="alreadyVotedModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow text-center">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title w-100" id="alreadyVotedModalLabel">Action non autorisée</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('assets/erreur.png') }}" alt="Erreur" class="img-fluid mb-3 rounded-circle shadow"
                    style="max-width: 120px;">
                <p class="fs-5">Vous avez déjà voté pour ce poste. <strong style="font-weight: bold"></strong></p>
                <img src="{{ asset('assets/emoji.jpg') }}" alt="emoji" class="img-fluid mb-3 rounded-circle shadow"
                    style="max-width: 120px;">

                <p class="text-muted">Un seul vote par poste est autorisé par personne.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de félicitation -->
<div class="modal fade" id="successVoteModal" tabindex="-1" aria-labelledby="successVoteModalLabel" aria-hidden="true">
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
</div>


<script>
    document.addEventListener("DOMContentLoaded", () => {
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
    });




    document.querySelectorAll('.btn-voter').forEach(button => {
        button.addEventListener('click', function () {
            const candidatId = this.getAttribute('data-id');
            const posteId = this.getAttribute('data-poste-id');
            const candidateName = this.closest('.card-body').querySelector('.card-title').innerText;

            document.getElementById('candidateName').innerText = candidateName;
            const confirmVoteModal = new bootstrap.Modal(document.getElementById('confirmVoteModal'));
            confirmVoteModal.show();

            document.getElementById('confirmVoteButton').onclick = function () {
                console.log(candidatId);

                fetch('/vote', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        candidat_id: candidatId ,
                        poste_id: posteId
                    })

                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('voterName').innerText = data.voter_name;
                        const successVoteModal = new bootstrap.Modal(document.getElementById('successVoteModal'));
                        successVoteModal.show();
                        confirmVoteModal.hide();
                    } else if (data.showModal) {
                        const alreadyVotedModal = new bootstrap.Modal(document.getElementById('alreadyVotedModal'));
                        alreadyVotedModal.show();
                        confirmVoteModal.hide();
                    } else {
                        alert(data.message || "Une erreur est survenue.");
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert("Une erreur est survenue. Veuillez réessayer.");
                });
            };
        });
    });





    document.addEventListener("DOMContentLoaded", () => {
        const sections = document.querySelectorAll(".page-section");

        const revealOnScroll = () => {
        sections.forEach(section => {
        const sectionTop = section.getBoundingClientRect().top;
        if (sectionTop < window.innerHeight - 100) { section.classList.add("revealed"); } }); };
            window.addEventListener("scroll", revealOnScroll); revealOnScroll();
    });


</script>

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
        const sections = document.querySelectorAll(".page-section");

        const revealOnScroll = () => {
            sections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                if (sectionTop < window.innerHeight - 100) {
                    section.classList.add("revealed");
                }
            });
        };

        window.addEventListener("scroll", revealOnScroll);
        revealOnScroll();
    });
</script>

@endsection
