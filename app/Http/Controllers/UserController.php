<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $totalVotes = Vote::count();
        $utilisateursInscrit = User::count();
        return view('users.index', compact('users',"totalVotes","utilisateursInscrit"));
    }
}
