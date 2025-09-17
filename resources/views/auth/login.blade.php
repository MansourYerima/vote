

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="icon" type="image/jpeg" href="{{ asset("assets/bde-high-resolution-logo.jpeg") }}">


    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assetlog/css/style.css')}}">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="{{route('login')}}" method="POST" id="signup-form" class="signup-form">
                       @csrf
                        <h2 class="form-title">connexion </h2>

                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Votre Email"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Mot de passe"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>


                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="se connecter"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Pas de compte ? <a href="{{route('register')}}" class="loginhere-link">s'inscrire</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('assetlog/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assetlog/js/main.js')}}"></script>
</body>
</html>
