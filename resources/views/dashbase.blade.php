<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard BDE</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/bde-high-resolution-logo.jpeg') }}">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .sidebar {
            background-color: #343a40;
            color: white;
            width: 250px;
            flex-shrink: 0;
            padding: 20px;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
        }
        .sidebar .nav-link {
            color: white;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            border-radius: 5px;
        }
        .content {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px;
            margin-left: 250px;
            background-color: #f8f9fa;
            height: 100vh;
        }
        .card {
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2 class="text-uppercase mb-4">Dashboard</h2>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="{{route('liste_vote')}}" class="nav-link"><i class="fas fa-poll"></i> Votes</a></li>
            <li class="nav-item mb-2"><a href="{{route('users')}}" class="nav-link"><i class="fas fa-users"></i> Utilisateurs</a></li>
            <li class="nav-item mb-2"><a href="{{route('candidates.index')}}" class="nav-link"><i class="fas fa-users"></i> Candidats</a></li>
        </ul>
    </div>

    <div class="w-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('home')}}">
                    <i class="fas fa-home text-primary me-2"></i>accueil
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        </li>
                    </ul>

                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-2"></i>Admin
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="#profile">Profil</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post" class="d-inline">
                                    @csrf
                                    <button style="color: #f8f9fa" class="dropdown-item" type="submit">Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
</body>
</html>
