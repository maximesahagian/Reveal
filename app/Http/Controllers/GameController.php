<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index()
    {
            return view('game');
    }

    //Function pour return le nombre de musique pour prendre un id aléatoire entre 1 et le nombre de musique.
    public function numberMusic(Request $request){
        $categorie = $_POST['categorie'];
        $mode = $_POST['mode'];
        //Ne pas oublier de rajouter le mode mix
        $number = DB::table('musiques')->where('categorie', $categorie)->count();
        if($mode == "mix"){
            $number = DB::table('musiques')->where('categorie', $categorie)->count();
            $musiques = $users = DB::table('musiques')->where('categorie', $categorie)->get();
        }
        else{
            $number = DB::table('musiques')->where('categorie', $categorie)->where('mode',$mode)->count();
            $musiques = $users = DB::table('musiques')->where('categorie', $categorie)->where('mode',$mode)->get();
        }

        $array_ids = [];

        foreach ($musiques as $musique) {
            array_push($array_ids, $musique->id);
        }

        $my_array = array(
            "number_music" => $number,
            "idsmsc" => $array_ids
                    );
                    return response()->json($my_array);
    }

    //Function avec id généré aléatoirement qui va prendre une musique aléatoire. Retourn les bons mots et le lien mp3.
    public function getMusic(Request $request){
        $categorie = $_POST['categorie'];
        $mode = $_POST['mode'];

        if($mode == "mix"){
            $music = DB::table('musiques')->where('id', $_POST['id'])->where('categorie', $categorie)->first();
            $array = explode(',', $music->words);
            $my_array = array(
                "links" => $music->link_mp3,
                "artiste" => $music->artiste,
                "titre" => $music->titre,
                "words_db" => $array);
            return response()->json($my_array);
        }
        else{
            $music = DB::table('musiques')->where('id', $_POST['id'])->where('categorie', $categorie)->where('mode',$mode)->first();
            $array = explode(',', $music->words);
            $my_array = array(
                "links" => $music->link_mp3,
                "artiste" => $music->artiste,
                "titre" => $music->titre,
                "words_db" => $array);
            return response()->json($my_array);
        }

    }

    //Upload du score, du nombre de fails, et du nombre de success dans la base de donnée si l'utilisateur est connecté.
    public function afterGame(Request $request){
        $score = $_POST['score'];
        $nb_success = $_POST['nb_success'];
        $nb_fails = $_POST['nb_fails'];

        if (Auth::check())
        {
            //Si c'est la première fois, on en créé une nouvelle.
            $user = DB::table('classementprofile')->where('pseudo', Auth::user()->username)->first();
            
            if (empty($user->nb_parties)){
                DB::table('classementprofile')->insert([
                    [
                        'pseudo' => Auth::user()->username,
                        'nb_parties' => "1",
                        'score' => $score,
                        'fails' => $nb_fails,
                        'success' => $nb_success
                    ]
                ]);
            }
            //Si c'est pas vide, on modifie
            else{

                $new_nb_parties = $user->nb_parties + 1;
                $new_nb_fails = $user->fails + $nb_fails;
                $new_nb_success = $user->success + $nb_success;

                if ($user->score < $score){
                    DB::table('classementprofile')
                        ->where('pseudo', Auth::user()->username)
                        ->update([
                                'score' => $score,
                                'nb_parties' => $new_nb_parties,
                                'fails' => $new_nb_fails,
                                'success' => $new_nb_success
                        ]);
                }
                else{
                    DB::table('classementprofile')
                        ->where('pseudo', Auth::user()->username)
                        ->update([
                            'nb_parties' => $new_nb_parties,
                            'fails' => $new_nb_fails,
                            'success' => $new_nb_success
                        ]);
                }
            }
        }
    }
}
