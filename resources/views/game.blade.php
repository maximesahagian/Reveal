<!DOCTYPE html>
<html>
<head>
    <title>Reveal || Quiz Musical</title>
    <script src="<?php echo asset('js/jquery.min.js') ?>"></script>
    <meta name="csrf-token" content="{!! Session::token() !!}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

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
    <script   src="https://code.jquery.com/jquery-3.0.0.min.js"   integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="   crossorigin="anonymous"></script>

</head>
<body>
<header style="display:none;">
    <div class="container headercontent">
        <div class="main-logo">
            <a href="{{ url('/connexion') }}"><img src="{{ asset('images/logo.png') }}" width="52px" alt=""></a>
        </div>
        <div class="score">
            <p>Score :<span id="score">0</span></p>
        </div>
        <nav>
            <p class="leave"><a href="{{ url('connexion') }}">Quitter le jeu</a></p>
        </nav>
    </div>
</header>

<div id="decompte" style="position:absolute;width:100%;text-align: center;color: white;font-family: WorkSans-Medium;font-size:50px; margin-top: 40vh">Préparez vous !</div>
<section id="game" style="display:none;">

    <div class="content">
        <ul class="contenues">
            <li>Temps restant :</li>
            <li id="time">01:00</li>
            <li>Réponse :</li>
            <li><input type="text" id="response"></li>
            <li id="goodanswer" style="margin-top: 5px;font-family: 'WorkSans-Medium'"></li>
        </ul>
    </div>

    <div class="next">
        <p style="cursor:pointer; color:white;font-family: 'WorkSans-Medium'" id="nextmusic">PASSER</p>
    </div>

    <div class="validate" style="cursor:pointer; color: white; font-family: 'WorkSans-Medium';">
        <p>VALIDER</p>
    </div>

</section>

<div id="modale-time" style="display:none;margin-bottom:35px;">

    <div id="timing">
        <ul>
            <ul>
                <li class="time-out">Partie terminée !</li>
                <li class="scored">votre score : <span id="scoremodale"></span></li>
                <li class="stats">Réponses justes : <span id="statgoodmodale"></span></li>
                <li class="stats">Réponses fausses : <span id="statfalsemodale"></span></li>
                <li class="stats">% de réussite : <span id="pourcentmodale"></span></li>
            </ul>

            <ul class="btn-time" style="cursor:pointer; font-family: 'WorkSans-Medium';">
                <a href="{{ url('classement') }}"><li class="classement"><button class="btn-class" style="color: white;cursor:pointer;">classement</button></li></a>
                <a href="javascript:window.location.reload()"><li class="replay"><button class="btn-replay" style="color: white;cursor:pointer;">rejouer</button></li></a>
            </ul>

            <ul class="btn-share">
                <li class="share-facebook"><p>Partager sur Facebook</p></li>
                <li class="logo-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//www.facebook.com/revealgame/?notif_t=fbpage_fan_invite%26notif_id=1467282678051723"><img src="{{asset('images/btn-facebook.png')}}" alt=""></a></li>
            </ul>
            <ul>
                <table id="tablemusics" style="width: 50%;margin:0 auto;margin-top:25px;">

                </table>
            </ul>
        </ul>

    </div>
</div>




<!-- Notre script js-->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>


<script>

    $('section').hide();
    $('header').hide();
    $('.main-logo').fadeIn(200);

    var arrays;
    //Début du jeu

    //Déclaration des variables nécessaires au développement
    var nb_success = 0;
    var nb_fails = 0;
    var time = 60;
    var score = 0;
    var words = [];
    var ids = [];
    var myAudio;
    var continuer = true;
    var artiste = [];
    var titre = [];
    var musics = [];

    $( "#response" ).focus();
    var idecompte = 3;

    var decompte = setInterval(function(){
        $('#decompte').html(idecompte);
        if(idecompte == 0){
            $('#decompte').html('Go !');
            clearInterval(decompte);
        }
        idecompte = idecompte-1;
    },1000);

    setTimeout(function(){
        $('#decompte').fadeOut(500);
        setTimeout(function(){
            startGame();
            $('section').fadeIn(500);
            $('header').fadeIn(500);
            $( "#response" ).focus();
        }, 500);
    }, 4000);

    //On lance le jeu


    //Intervals qui permettront de modfier le temps chaque seconde, et de modifier le score toutes les 3 secondes (-1 pts)


    //Function qui sera exécutée toutes les 3 secondes pour retirer 1 points
    function checkScore(){
        if (continuer){
            score = score - 1;
            $('#score').html(score);
        }

    }

    //Function pour retirer 1 au compteur toutes les secondes.
    function checkTime(){

        //On termine le jeu si le temps est fini.
        if (continuer) {
            if (time == 0) {
                continuer = false;
                endGame();
                clearInterval(myVar);
                clearInterval(myVar2);
            }
            else if(time <= 10){
                time = time - 1;
                $('#time').html("00:0"+time);
            }
            else {
                time = time - 1;
                $('#time').html("00:"+time);
            }
        }
    }

    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }



    //On lance le jeu.
    function startGame(){

        var myVar2 = setInterval(function(){ checkScore() }, 5000);
        var myVar = setInterval(function(){ checkTime() }, 1000);

        var categorie = getUrlVars()["categorie"];
        var mode = getUrlVars()["mode"];

        if(categorie == "electro" || categorie == "variete"){
            if(mode == "lent" || mode == "deforme" || mode == "normal" || mode == "inverse" || mode == "instrumental" || mode == "mix"){
                //On veut tout d'abbord connaître le nombre de musique
                $.post('numbermusic', {
                            _token: $('meta[name=csrf-token]').attr('content'),
                            categorie: categorie,
                            mode: mode
                        }
                        )
                        .done(function(data) {
                            var arrayids = data.idsmsc;

                            //l'id sera compris entre 1 et le nombre de musique
                            var id = arrayids[Math.floor(Math.random()*arrayids.length)];


                            //On rentre id dans le tableau "ids" pour ne pas se resservir de l'id.
                            ids.push(id);

                            //On prend une musique aléatoire en fonction de l'id. Voir GameController pour le back.
                            $.post('getmusic', {
                                        _token: $('meta[name=csrf-token]').attr('content'),
                                        id: id,
                                        categorie: categorie,
                                        mode: mode
                                    }
                                    )
                                    .done(function(data) {
                                        //Nom du fichier musique = newarray ou data.links
                                        var newarray = data.links;
                                        //On lance la musique en allant la chercher.
                                        artiste = data.artiste;
                                        titre = data.titre;
                                        myAudio = new Audio("musics/"+newarray);
                                        myAudio.play();
                                        //On prend les mots justes que l'utilisateur pourra rentrer.
                                        arrays = data.words_db;
                                    })
                                    .fail(function() {
                                        alert( "Une erreur est survenue." );
                                    });
                        })
                        .fail(function() {
                            alert( "Une erreur est survenue." );
                        });
            }
            else{
                alert("Le mode de jeu n'a pas pu être identifié. Relancez le jeu. Redirection..");
                $(location).attr('href', 'categories')
            }
        }
        else{
            alert("La catégorie n'a pas pu être identifiée. Relancez le jeu. Redirection..");
            $(location).attr('href', 'categories')
        }


    }

    $('.validate').click(function(){
        //Si le temps n'est pas fini on check ce qu'a rentré l'utilisateur lorsqu'il appuie sur entrée.
        if(time > 0) {
            //Si ce qu'a rentré l'utilisateur correspond à un élément dans le tableau "arrays" on ajoute 30 pts et un réussi.
            if(jQuery.inArray($('#response').val().toLowerCase(), arrays) !== -1 && continuer) {

                $('.content').css({"background-color": "#00e8ab"});
                $('#response ').val('');
                setTimeout(function(){
                    $('.content').css({"background": "transparent"});
                }, 500);


                nb_success = nb_success + 1;
                score = score + 30;
                $('#score').html(score);

                nextMusic(myAudio,"true");
                $( "#response" ).focus();

            }
            else{

                $('.content').css({"background-color": "#ff9073"});
                $('#response ').val('');
                setTimeout(function(){
                    $('.content').css({"background": "transparent"});
                }, 500);

                nb_fails = nb_fails + 1;
                $( "#response" ).focus();

            }
        }
    });

    $("#response").on("keydown",function search(e) {
        //Si le temps n'est pas fini on check ce qu'a rentré l'utilisateur lorsqu'il appuie sur entrée.
        if(time > 0 && e.keyCode == 13) {
            //Si ce qu'a rentré l'utilisateur correspond à un élément dans le tableau "arrays" on ajoute 30 pts et un réussi.
            if(jQuery.inArray($('#response').val().toLowerCase(), arrays) !== -1 && continuer) {

                $('.content').css({"background-color": "#00e8ab"});
                $('#response ').val('');
                setTimeout(function(){
                    $('.content').css({"background": "transparent"});
                }, 500);

                nextMusic(myAudio,"true");

                nb_success = nb_success + 1;
                score = score + 30;
                $('#score').html(score);

            }
            else{

                $('.content').css({"background-color": "#ff9073"});
                $('#response ').val('');
                setTimeout(function(){
                    $('.content').css({"background": "transparent"});
                }, 500);

                nb_fails = nb_fails + 1;

            }
        }
    });

    $('#nextmusic').on('click',function(){
        if(continuer){
            $('#goodanswer').html("La réponse était: "+artiste+" - "+titre);
            setTimeout(function(){
                $('#goodanswer').html('');
            }, 3500);
            nextMusic(myAudio,"false");
            score = score - 5;
            $('#score').html(score);
            $('.content').css({"background-color": "#ff9073"});
            $('#response ').val('');
            setTimeout(function(){
                $('.content').css({"background": "transparent"});
            }, 500);

            nb_fails = nb_fails + 1;
        }
    });

    function nextMusic(audio,bool){


        musics.push(artiste,titre,bool);

        console.log(musics);

        $( "#response" ).focus();
        audio.pause();
        myAudio.pause();

        var categorie = getUrlVars()["categorie"];
        var mode = getUrlVars()["mode"];

                //On veut tout d'abbord connaître le nombre de musique
                $.post('numbermusic', {
                            _token: $('meta[name=csrf-token]').attr('content'),
                            categorie: categorie,
                            mode: mode
                        }
                        )
                        .done(function(data) {
                            var arrayids = data.idsmsc;
                            //l'id sera compris entre 1 et le nombre de musique

                            var id = arrayids[Math.floor(Math.random()*arrayids.length)];

                            if(ids.length == data.number_music){
                                alert("Le jeu est fini avec " + score + " points, bien joué. Nous n'avons plus de musique à vous proposer dans ce mode et dans cette catégorie.");
                                continuer = false;
                                endGame();
                            }

                            else{
                                while(jQuery.inArray(id, ids) !== -1){
                                    id = arrayids[Math.floor(Math.random()*arrayids.length)];
                                }

                                ids.push(id);

                                $.post('getmusic', {
                                            _token: $('meta[name=csrf-token]').attr('content'),
                                            id: id,
                                            categorie: categorie,
                                            mode: mode
                                        }
                                        )
                                        .done(function(data) {
                                            if (time > 0){
                                                //Nom du fichier musique = newarray ou data.links
                                                var newarray = data.links;
                                                artiste = data.artiste;
                                                titre = data.titre;
                                                //On lance la musique en allant la chercher.
                                                myAudio = new Audio("musics/"+newarray);
                                                myAudio.play();
                                                //On prend les mots justes que l'utilisateur pourra rentrer.
                                                arrays = data.words_db;
                                            }
                                        })
                                        .fail(function() {
                                            alert( "Une erreur est survenue." );
                                        });
                            }
                        })
                        .fail(function() {
                            alert( "Une erreur est survenue." );
                        });
    }


    //Recup des données et mise dans la base de données.
    function endGame(){
        myAudio.pause();

        musics.push(artiste,titre,"encours");

        for(var a = 0;a < musics.length; a = a +3){
            var tablenow = $('#tablemusics').html();
            console.log(tablenow);
            if (musics[a+2] == "true") {
                $('#tablemusics').html(tablenow + "<tr style='height:30px;width: 100%;text-align: center;'><td style='float:left;color:#00e8ab;'>" + musics[a] + "</td><td style='float:right;color:#00e8ab;'>" + musics[a + 1] + "</td></tr>");
            }
            else if(musics[a+2] == "encours"){
                $('#tablemusics').html(tablenow + "<br><tr style='height:30px;width: 100%;text-align: center;'><td style='float:left;color:#fff;'>En cours: </td><td style='float:right;'></td><tr style='height:30px;width: 100%;text-align: center;'><td style='float:left;color:#fff;'>" + musics[a] + "</td><td style='float:right;color:#fff;'>" + musics[a + 1] + "</td></tr>");
            }
            else{
                $('#tablemusics').html(tablenow+"<tr style='height:30px;width: 100%;text-align: center;'><td style='color:#ff9073;float:left;'>"+musics[a]+"</td><td style='color:#ff9073;float:right;'>"+musics[a+1]+"</td></tr>");
            }
        }



        $('#game').fadeOut(500);
        $('.headercontent').fadeOut(500);

        setTimeout(function(){
            var pourcents = (nb_success)/(nb_fails+nb_success)*100;
            var pourcent = Math.round(pourcents);
            if(nb_fails == 0 && nb_success == 0) {
                $('#pourcentmodale').html("0%");
            }
            else if(nb_fails == 0){
                $('#pourcentmodale').html("100%");
            }
            else{
                $('#pourcentmodale').html(pourcent+"%");
            }
            $('#modale-time').fadeIn(500);
            $('#scoremodale').html(score);
            $('#statgoodmodale').html(nb_success);
            $('#statfalsemodale').html(nb_fails);
        }, 500);

        $.post('game/aftergame', {
                    _token: $('meta[name=csrf-token]').attr('content'),
                    score: score,
                    nb_success: nb_success,
                    nb_fails: nb_fails
                }
                )
                .done(function(data) {
                    console.log(data);
                })
                .fail(function() {
                    alert( "error" );
                });
    }


</script>
</body>
</html>
