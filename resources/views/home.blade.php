<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reveal || Intro</title>
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
    <!-- CDN JQUERY-->
    <script src="https://code.jquery.com/jquery-2.0.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TweenMax.min.js"></script>
    <script src="{{ asset('js/animation.js') }}"></script>

</head>
<body id="intro">

<header>
    <div id="passer"><a href="{{ url('/connexion') }}"><span class="passer">Passer</span></a></div>
</header>

<section id="contenu">

    <video  autoplay poster muted="{{ asset('images/intro.jpg') }}" id="bgvid">
        <source src="{{ asset('movie/intro.webm') }}" type="video/webm">
        <source src="{{ asset('movie/intro.avi') }}" type="video/avi">

    </video>
    <section id="introduction">

        <div class="discover"><p>Vous connaissez vos musiques préférées par coeur ?</p></div>
        <div class="solo" style="margin-top:-45px;"><p>Saurez-vous les reconnaître à la façon Reveal ?</p></div>

    </section>

</section>

<section id="home" style="margin-left: 22.9%;">
    <div class="connexion">
        <p><a href="{{ url('/instructions') }}">Commencer</a></p>
    </div>
    <div class="logo">
        <a href="{{ url('/connexion') }}"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
        <p>Quiz Musical</p>
    </div>
    <div class="identification">
        <p><a href="#" id="connect">{{app('\App\Http\Controllers\ConnectionController')->getConnection()}}</a></p>
    </div>
</section>

<!-- Notre script js-->
<script src="{{ asset('js/main.js') }}"></script>

<script>
    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }

    var categorie = getUrlVars()["categorie"];
</script>
</body>
</html>