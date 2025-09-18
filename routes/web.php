<?php

use App\Models\Candidate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;

use App\Models\User;
use App\Models\Vote;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Auth::routes();



Route::get('/', [PageController::class, 'index'])->name('home');

Route::resource('candidates', CandidateController::class);


Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
    Route::get('/users', [UserController::class, "index"])->name('users');
    Route::post('/users/regiter', [UserController::class, "store"])->name('users.store');
    Route::get('/liste_vote', [DashbordController::class, "liste_vote"])->name("liste_vote");
    Route::get('/dashbord', function () {
        $totalVotes = Vote::count();
        $utilisateursInscrit = User::count();
        return view("dashbase", compact("totalVotes", "utilisateursInscrit"));
    })->name("dashboard");
});
