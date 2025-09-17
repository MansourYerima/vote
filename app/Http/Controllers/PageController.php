<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Poste;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::all();
        $postes = Poste::with("candidates")->get();

        return view('welcome',compact('candidates',"postes"));
    }
}
