<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Afficher la page de vote.
     *
     * @return \Illuminate\View\View
     */




    public function showVotePage()
    {
        // Récupérer tous les candidats
        $candidates = Candidate::all();

        return view('welcome', compact('candidates'));
    }



    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Vous devez être connecté pour voter.'], 403);
        }

        $validatedData = $request->validate([
            'candidat_id' => 'required|exists:candidates,id',
            'poste_id' => 'required|exists:postes,id'
        ]);

        $userId = Auth::id();
        $candidatId = $validatedData['candidat_id'];
        $posteId = $validatedData['poste_id'];

        $candidat = Candidate::with('postes')->find($candidatId);
        if (!$candidat || $candidat->postes->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Le candidat n\'est pas associé à un poste.'], 400);
        }

        // $posteId = $candidat->postes->first()->id;

        $existingVote = Vote::where('user_id', $userId)
                            ->where('poste_id', $posteId)
                            ->exists();

        if ($existingVote) {
            return response()->json(['success' => false, 'showModal' => true, 'message' => 'Vous avez déjà voté pour ce poste.']);
        }

        Vote::create([
            'user_id' => $userId,
            'candidate_id' => $candidatId,
            'poste_id' => $posteId,
        ]);

        return response()->json(['success' => true, 'message' => 'Vote enregistré avec succès.', 'voter_name' => Auth::user()->name]);
    }
}
