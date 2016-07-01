<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ModeController extends Controller
{
    public function index(){
        return view('mode');
    }
}
