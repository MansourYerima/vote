

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="icon" type="image/jpeg" href="{{ asset("assets/bde-high-resolution-logo.jpeg") }}">


    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assetlog/css/style.css')}}">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="{{route('users.store')}}" method="POST" id="signup-form" class="signup-form">
                       @csrf
                        <h2 class="form-title">créer votre compte </h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Votre Nom"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Votre Email"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="mot de passe"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password_confirmation" id="re_password" placeholder="Repeter votre mot de passe"/>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="s'inscrire"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        vous êtes déjà inscrit ? <a href="{{route('login')}}" class="loginhere-link">se connecter</a>
                    </p>
                </div>
            </div>
        </section>

    </div>


    <script src="{{asset('assetlog/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assetlog/js/main.js')}}"></script>
</body>
</html>
