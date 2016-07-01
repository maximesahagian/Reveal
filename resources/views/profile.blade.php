<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{!! Session::token() !!}">
    <title>Reveal || Profil</title>
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

<section id="container-profil">
    <div class="name-profil">
        <h2>{{ Auth::user()->username }}</h2>
    </div>

    <div class="photo-profil">
        <img id="imgprofile" style="width: 200px;" src="" alt="">
        <p id="clickupload"><a href="">Modifier ma photo</a></p>

        <form method="post" action="{{ action('ProfileController@uploadImg') }}">
            <input id="inputupload" name="profileimg" type="file" hidden="hidden">
            <input id="submitimg" hidden="hidden" type="submit">
        </form>
    </div>

    <div class="table-profil">
        <table>
            <tr>
                <th>Pseudo :</th>
                <td>{{ Auth::user()->username }}</td>
                <td><a href="">Modifier</a></td>
            </tr>
            <tr>
                <th>Rang :</th>
                <td id="rank">{{app('\App\Http\Controllers\ProfileController')->getRank()}}</td>
            </tr>
            <tr>
                <th>Record :</th>
                <td>{{app('\App\Http\Controllers\ProfileController')->getScore()}}</td>
            </tr>
            <tr>
                <th>Parties jouées :</th>
                <td>{{app('\App\Http\Controllers\ProfileController')->getGames()}}</td>
            </tr>
            <tr>
                <th>% de réussite :</th>
                <?php
                    $reussi = app('\App\Http\Controllers\ProfileController')->getPourcent();
                    if ($reussi > 50){
                        echo "<td style='color: #00e8ab;'>".$reussi."%</td>";
                    }
                    elseif($reussi == "Aucun"){
                        echo "<td style=''>".$reussi."</td>";
                    }
                    else{
                        echo "<td style='color: red'>".$reussi."%</td>";
                    }
                ?>

                <td></td>
            </tr>
        </table>

        <p id="changemdp"><a id="achangemdp" style="cursor: pointer">Modifier mon mot de passe</a><br></p>


    </div>

    <div class="new-partie">
        <p><a href="{{ url('instructions') }}">NOUVELLE PARTIE</a></p>
    </div>

</section>







<!-- Notre script js-->
<script src="{{ asset('js/main.js') }}"></script>
<script>

    $.post('{{ action('ProfileController@getImg') }}', {
                _token: $('meta[name=csrf-token]').attr('content')
            }
            )
            .done(function(data) {
                $('#imgprofile').attr("src","images/users/"+data);
            })
            .fail(function() {
                alert( "Une erreur est survenue." );
            });

    $('#clickupload').click(function() {
        $('#inputupload').trigger('click');
    });


    $("#inputupload").change(function (event){

    });

    $('#achangemdp').click(function(){
        $('#achangemdp').fadeOut(300);
    })
    
</script>
</body>
</html>