<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ClassementController extends Controller
{
    public function index(){
        return view('classement');
    }

    public function readScore(){
        $users = DB::table('classementprofile')->orderBy('score','desc')->take(10)->get();
        $i = 1;
        foreach ($users as $user) {
            $pourcentage = round($user->success / ($user->success + $user->fails) * 100, 1);
            echo "<tr><td>".$i."</td>";
            echo "<td>".$user->pseudo."</td>";
            echo "<td>".$user->score."</td>";
            echo "<td>".$user->nb_parties."</td></tr>";
            $i++;
        }
    }
}
