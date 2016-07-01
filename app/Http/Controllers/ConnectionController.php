<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ConnectionController extends Controller
{
    public function index(){
        return view('connection');
    }

    public function getConnection(){
        if (Auth::check())
        {
            return "Se déconnecter";
        }
        else{
            return "S'identifier";
        }
    }
}
