<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index()
    {

        $totalVotes = Vote::count();
        $utilisateursInscrit = User::count();
        return view("dashbase", "totalVotes","utilisateursInscrit");
    }

    public function liste_vote()
    {

        $totalVotes = Vote::count();
        $utilisateursInscrit = User::count();
        $postes = Poste::with("candidates")->get();

        return view("vote.liste_vote", compact("totalVotes","utilisateursInscrit","postes"));
    }
}

