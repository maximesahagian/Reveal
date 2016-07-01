<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Reveal || Accueil</title>
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
    <script src="{{ asset('js/jquery-2.0.0.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</head>
<body>

@if ($errors->has('username'))
    <div style="width: 100%;text-align:center;position:absolute;top: 100px;right:20px;">
<span style="font-family:'WorkSans-Medium';color: #a94442;background-color: #f2dede;border-color: #ebccd1;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;">
        <strong>{{ $errors->first('username') }}</strong>
     </span>
        </div>
@endif

@if ($errors->has('password'))
    <div style="width: 100%;text-align:center;position:absolute;top: 100px;right:20px;">
<span style="font-family:'WorkSans-Medium';color: #a94442;background-color: #f2dede;border-color: #ebccd1;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;">
        <strong>{{ $errors->first('password') }}</strong>
     </span>
    </div>
@endif

@if ($errors->has('email'))
    <div style="width: 100%;text-align:center;position:absolute;top: 100px;right:20px;">
<span style="font-family:'WorkSans-Medium';color: #a94442;background-color: #f2dede;border-color: #ebccd1;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;">
        <strong>{{ $errors->first('email') }}</strong>
     </span>
    </div>
@endif

@if ($errors->has('password_confirmation'))
    <div style="width: 100%;text-align:center;position:absolute;top: 100px;right:20px;">
<span style="font-family:'WorkSans-Medium';color: #a94442;background-color: #f2dede;border-color: #ebccd1;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;">
        <strong>{{ $errors->first('password_confirmation') }}</strong>
     </span>
    </div>
@endif


<section id="home">
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


<section id="modale" hidden="hidden">
    <div id="login">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
        <ul>
            <li class="cross"><a href="#"><img src="images/croix.png" alt="quitter"></a></li>
            <li class="title-conn">connexion</li>
            <li class="pseudo"><label for="pseudo">Pseudo</label>
                <input id="pseudo" name="username" type="text" /></li>
            <li class="password"><label for="password">Mot de passe</label>
                <input id="password" type="password" name="password"/></li>
            <li class="ok"><button style="width: 200px; cursor: pointer;" class="btn-ok">connexion</button></li>
            <li class="new-account"><a href="#">Nouveau compte</a></li>
            <li class="f-password"><a href="#">Mot de passe oublié</a></li>
            <div class="checkbox" hidden="hidden">
                <label>
                    <input type="checkbox" id="checkconnect" name="remember"> Remember Me
                </label>
            </div>
        </ul>
        </form>

    </div>
</section>

<section id="modale-inscription" hidden="hidden">
    <div id="inscription">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}
        <ul>
            <li class="cross-inscr"><a href="#"><img src="{{ asset('images/croix.png') }}" alt="quitter"></a></li>
            <li class="title-inscr">nouveau compte</li>
            <li class="email"><label for="email">Email</label>
                <input style="outline: none;" id="email" name="email" type="email" /></li>
            <li class="pseudo-inscr"><label for="pseudo">Pseudo</label>
                <input id="pseudo" name="username" type="text" /></li>
            <li class="password-inscr"><label for="password">Mot de passe</label>
                <input id="password" name="password" type="password" /></li>
            <li class="confirmation"><label for="password">Confirmation</label>
                <input id="confirmation" name="password_confirmation" type="password" /></li>
            <li class="creer"><button style="cursor: pointer;" class="btn-inscr">créer</button></li>
        </ul>
        </form>
    </div>
</section>


<!-- Notre script js-->
<script src="{{ asset('js/main.js') }}"></script>
<script>
    $('#modale').hide();
    $('#modale-inscription').hide();

    $('#connect').click(function(){
        if($('#connect').html() !== "S'identifier"){
            $('#modale').hide();
            window.location = "logout";
        }

        else{
            $('#modale').fadeIn(1000);
        }
    });

    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }

    var modaleok = getUrlVars()["connect"];

    if(modaleok == "ok"){
        $('#modale').show();
        $('.connexion').hide();
        $('.logo').hide();
        $('.identification').hide();
    }

    $('#checkconnect').prop( "checked", true );
</script>
</body>
</html>