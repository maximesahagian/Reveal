<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class InstructionsController extends Controller
{


    public function index(){
        return view('instructions');
    }
    public function getWelcome(){
        if(Auth::check()){
            echo "Bienvenue </br><span class='colors'>".Auth::user()->username."</span> !";
        }
        else{
            echo "Bienvenue !";
        }
    }
}
