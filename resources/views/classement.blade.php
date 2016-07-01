<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Reveal || Classement</title>
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
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <script src="{{ asset('js/jquery-2.0.0.js') }}"></script>
    <!-- CDN JQUERY-->
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

<section id="container-classement">
    <div class="border-top">
        <h2>Classement des </br>joueurs.</h2>
    </div>

    <div class="table-score">
        <table>
            <tr>
                <th>Rang</th>
                <th>Pseudo</th>
                <th>Record</th>
                <th>Parties jouées</th>
            </tr>
            {{app('\App\Http\Controllers\ClassementController')->readScore()}}
        </table>
    </div>

    <div class="new-partie">
        <p>
            <a href="{{ url('/categories') }}">NOUVELLE PARTIE</a>
        </p>
    </div>

</section>







<!-- Notre script js-->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>