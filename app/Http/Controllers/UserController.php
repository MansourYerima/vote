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

    public function store(Request $request)
        {
            // Validation des données
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Création de l'utilisateur
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'email_verified_at' => now(),
                'password' => Hash::make($validated['password']),
                'remember_token' => bin2hex(random_bytes(5)),
            ]);

            return response()->json([
                'message' => 'Utilisateur créé avec succès 🎉',
                'user' => $user
            ], 201);
        }
}
