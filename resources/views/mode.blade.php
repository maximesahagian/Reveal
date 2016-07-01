<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Reveal || Modes</title>
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

<section id="mode">
    <div class="choose">
        <p>Il s'agit du mode d'écoute des morceaux</br>durant le quiz</p>
        <hr>
        <div class="choose-game">
            <p class="welcome">Vous y êtes </br><span class="colors_green" style="font-family: 'WorkSans-Medium';">presque !</span></p>
            <span>Choisissez à présent une version du jeu :</span>
        </div>
    </div>
    <div class="selection">

        <div class="pictures-bg normaldiv">
            <img class="bg-full" src="{{ asset('images/normal.png') }}" width="207px" alt="">

            <div class="icone-center">
                <img class="background-picture" src="{{ asset('images/normal-note.png') }}" alt="">
                <p class="modes un">Normal</p>
            </div>
        </div>

        <div class="pictures-bg inversediv">
            <img class="bg-full" src="{{ asset('images/electro.png') }}" width="207px" alt="">

            <div class="icone-center">
                <img class="background-picture" src="{{ asset('images/inverse-note.png') }}" alt="">
                <p class="modes un">Inversé</p>
            </div>
        </div>

        <div class="pictures-bg instrudiv">
            <img class="bg-full" src="{{ asset('images/instrumental.png') }}" width="207px" alt="">

            <div class="icone-center">
                <img class="background-picture" src="{{ asset('images/guitar.png') }}" alt="">
                <p class="modes trois">Instrumental</p>
            </div>
        </div>

        <div class="pictures-bg ralentidiv">
            <img class="bg-full" src="{{ asset('images/lent.png') }}" width="207px" alt="">

            <div class="icone-center">
                <img class="background-picture" src="{{ asset('images/lent-escargot.png') }}" alt="">
                <p class="modes quatre">Ralenti</p>
            </div>
        </div>

        <div class="pictures-bg accelerediv">
            <img class="bg-full" src="{{ asset('images/deforme.png') }}" width="207px" alt="">

            <div class="icone-center">
                <img class="background-picture" src="{{ asset('images/deforme-hamster.png') }}" alt="">
                <p class="modes cinq">Accéléré</p>
            </div>
        </div>

        <div class="pictures-bg mixdiv">
            <img class="bg-full" src="{{ asset('images/mix.png') }}" width="207px" alt="">

            <div class="icone-center">
                <img class="background-picture" src="{{ asset('images/shuffle.png') }}" alt="">
                <p class="modes six">Mix</p>
            </div>
        </div>

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
    $('.normaldiv').click(function(){
        window.location = "jeu?categorie="+categorie+"&mode=normal";
    });

    $('.inversediv').click(function(){
        window.location = "jeu?categorie="+categorie+"&mode=inverse";
    });

    $('.instrudiv').click(function(){
        window.location = "jeu?categorie="+categorie+"&mode=instrumental";
    });

    $('.ralentidiv').click(function(){
        window.location = "jeu?categorie="+categorie+"&mode=lent";
    });

    $('.accelerediv').click(function(){
        window.location = "jeu?categorie="+categorie+"&mode=deforme";
    });

    $('.mixdiv').click(function(){
        window.location = "jeu?categorie="+categorie+"&mode=mix";
    });
</script>
</body>
</html>