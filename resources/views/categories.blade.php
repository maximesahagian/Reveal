<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Reveal || Catégories</title>
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
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/jquery.jcarousellite.js') }}"></script>


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

<section id="personnel">
    <p class="welcome"></br><span class="colors_green">Très bien !</span></p>
    <span class="categorie-title">Choisissez une catégorie de musique :</span>
</section>

<div class="slider">

    <button class="prev"></button>

    <div class="any-class">
        <ul>

            <li>
                <div class="img-screen">
                    <img src="{{ asset('images/hover/alternatif.png') }}" style="cursor:pointer;width:200px; height:200px;">
                </div>
                <p style="cursor:pointer">Alternatif</p><hr class="alternatif">
            </li>

            <li><a href="mode?categorie=electro"><img src="{{ asset('images/hover/country.png') }}" style="cursor:pointer;width:200px; height:200px;">
                <p style="cursor:pointer">Country</p></a><hr class="country"></li>

            <li><a href="mode?categorie=electro"><img src="{{ asset('images/hover/dessinsanimes.png') }}" style="cursor:pointer;width:200px; height:200px;">
                <p style="cursor:pointer">Dessins Animés</p></a><hr class="dessins"></li>

            <li><a href="mode?categorie=electro"><img src="{{ asset('images/hover/poprock.png') }}" style="width:200px; height:200px;">
                    <p>Pop Rock</p><hr class="pop"></a></li>

            <li><a href="mode?categorie=electro"><img src="{{ asset('images/hover/films.png') }}" style="cursor:pointer;width:200px; height:200px;">
                <p style="cursor:pointer">Films</p><hr class="films"></a></li>

            <li><a href="mode?categorie=electro"><img src="{{ asset('images/hover/hiphop.png') }}" style="cursor:pointer;width:200px; height:200px;">
                <p style="cursor:pointer">Hip Hop</p><hr class="hiphop"></a></li>

            <li><a href="mode?categorie=electro"><img src="{{ asset('images/hover/jazzblues.png') }}" style="cursor:pointer;width:200px; height:200px;">
                <p style="cursor:pointer">Jazz</p><hr class="jazz"></a></li>

            <li><a href="mode?categorie=variete"><img src="{{ asset('images/hover/variete.png') }}" style="cursor:pointer;width:200px; height:200px;">
                    <p style="cursor:pointer">Variété</p><hr class="variete"></a></li>

            <li><a href="mode?categorie=electro"><img src="{{ asset('images/hover/electro.png') }}" style="cursor:pointer;width:200px; height:200px;">
                    <p style="cursor:pointer">Electro</p><hr class="electro"></a></li>

            <li><a href="mode?categorie=electro"><img src="{{ asset('images/hover/reggae.png') }}" style="cursor:pointer;width:200px; height:200px;">
                <p style="cursor:pointer">Reggae</p></a><hr class="reggae"></li>

        </ul>
    </div>

    <button class="suivant"></button>
</div>

<!-- Notre script js-->
<script src="{{ asset('js/main.js') }}"></script>

<script>
</script>
</body>
</html>