<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Reveal || Instructions</title>
    <meta name="description" content="A décrire">
    <!-- La balise keywords n’est pas supporté par Google -->
    <meta name="keywords" content="jeu, amusement, ludique, quizz, musiques, blind-test">
    <meta name="author" content="Equipe de Reveal">
    <meta name="application-name" content="Reveal">
    <meta name="web_author" content="Reveal"/>
    <link rel="icon" type="image/png" href="{{ asset('images/fav_real.png') }}" />
    <!-- Reset CSS-->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <!-- Feuille de style CSS-->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <!-- CDN JQUERY-->
    <script src="{{ asset('js/jquery-2.0.0.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>

</head>
<body>
<header>
    <div class="container">
        <div class="main-logo">
            <a href="{{ url('/connexion') }}"><img src="{{ asset('images/logo.png') }}" width="52px" alt=""></a>
        </div>
        <div class="screen">
            <nav>
                <div class="toggle"><span>Menu</span></div>
                <div class="menu-container">
                    <ul class="menu visually-hidden">
                        <li><a href="{{ url('/connexion') }}">Accueil</a></li>
                        <li><a href="{{ url('/profil') }}">Mon profil</a></li>
                        <li><a href="{{ url('/classement') }}">Classement</a></li>
                        <li><a href="#">Plus de contenu</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<section id="container-indications">
    <div class="indication-one">
        <h2>{{app('\App\Http\Controllers\InstructionsController')->getWelcome()}}</h2>
        <p>Voici quelques indications de jeu :</p>
    </div>

    <div class="indication-two">
        <p class="indicate">Votre but : deviner le plus de</br></br> morceaux possible en 1 minute !</p>
        <hr>
        <a href="{{ url('categories') }}"><div class="go">
            <p class="party">C'EST PARTI !</p>
        </div></a>
    </div>

    <div class="global-indicate">

        <div class="sub-global-one">
            <img src="{{ asset('images/indication-1.png') }}" width="250px" alt="">
            <p>Entrez l'artiste</br>ou le titre du </br>morceau</p>
            <hr>
        </div>

        <div class="sub-global-two">
            <img src="{{ asset('images/indication-2.png') }}" width="250px" alt="">
            <p>Juste = 30 points</br>Passer = -5 points</p>
            <hr>
        </div>

        <div class="sub-global-three">
            <img src="{{ asset('images/indication-3.png') }}" width="250px" alt="">
            <p>-1 point/</br>5 secondes de jeu</p>
            <hr>
        </div>
    </div>

    </div>

</section>






<!-- Notre script js-->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>