<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    public function index(){
        if (Auth::check()){
            return view('profile');
        }
        else{
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: '.url('connexion?connect=ok'));
            exit();
        }
    }

    public function getImg(){
        $user = DB::table('users')->where('username', Auth::user()->username)->first();
        $link = $user->link_img;
        return response()->json($link);
    }

    public function uploadImg(){
        if(count($_FILES) > 0) {
            foreach($_FILES as $file) {
                //DO whatever you want with your file, save it in the db or stuff...
                //$file["name"];
                //$file["tmp_name"];
                //Insert here bla blubb
                return "success";
            }
        }
        die();
    }

    public function getRank(){
        $users = DB::table('classementprofile')->orderBy('score','desc')->get();
        $i = 1;
        $pseudoAuth = Auth::user()->username;
        $user = DB::table('classementprofile')->where('pseudo',$pseudoAuth)->first();

        if($user == null){
            return "Aucun";
        }

        else{
            foreach($users as $user){
                if($user->pseudo == $pseudoAuth){
                    if($i == 1){
                        return $i."er";
                    }
                    else{
                        return $i."ème";
                    }
                }

                $i++;
            }
        }
    }

    public function getScore(){
        $user = DB::table('classementprofile')->where('pseudo', Auth::user()->username)->first();
        if(!$user == null){
            return $user->score;
        }
        else{
            return "Aucun";
        }
    }

    public function getGames(){
        $user = DB::table('classementprofile')->where('pseudo', Auth::user()->username)->first();
        if(!$user == null) {
            $games = $user->nb_parties;
            return $games;
        }
        else{
            return "Aucune";
        }
    }

    public function getPourcent(){
        $user = DB::table('classementprofile')->where('pseudo', Auth::user()->username)->first();
        if(!$user == null) {
            if ($user->success == 0){
                return 0;
            }
            elseif($user->fails == 0 & $user->success > 0){
                return 100;
            }
            else{
                $pourcentage = round($user->success / ($user->success + $user->fails) * 100, 1);
                return $pourcentage;
            }
        }
        else{
            return "Aucun";
        }
    }

}
