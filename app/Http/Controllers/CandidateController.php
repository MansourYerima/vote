<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Poste;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    /**
     * Afficher la liste des candidats.
     */
    public function index()
    {
        $candidates = Candidate::all();
        $totalVotes = Vote::count();
        $utilisateursInscrit = User::count();
        return view('candidates.index', compact('candidates', "totalVotes", "utilisateursInscrit"));
    }

    /**
     * Afficher le formulaire pour ajouter un nouveau candidat.
     */
    public function create()
    {
        $totalVotes = Vote::count();
        $utilisateursInscrit = User::count();
        $postes = Poste::all();
        return view('candidates.create', compact('totalVotes', 'utilisateursInscrit', "postes"));
    }

    /**
     * Enregistrer un nouveau candidat.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'programme' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'poste' => "required|array"
        ]);

        $candidate = new Candidate();
        $candidate->name = $request->name;
        $candidate->programme = $request->programme;

        // Gestion de l'image de photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $candidate->photo = $photoPath;
        }

        $candidate->save();
        $candidate->postes()->sync($request->poste);

        return redirect()->route('candidates.index')->with('success', 'Candidat créé avec succès.');
    }

    /**
     * Afficher les détails d'un candidat.
     */
    public function show(Candidate $candidate)
    {
        return view('candidates.show', compact('candidate'));
    }

    /**
     * Afficher le formulaire pour modifier un candidat.
     */
    public function edit(Candidate $candidate)
    {
        return view('candidates.edit', compact('candidate'));
    }

    /**
     * Mettre à jour les informations d'un candidat.
     */
    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'programme' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $candidate->name = $request->name;
        $candidate->programme = $request->programme;

        // Gestion de l'image de photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($candidate->photo) {
                \Storage::delete('public/' . $candidate->photo);
            }
            $photoPath = $request->file('photo')->store('photos', 'public');
            $candidate->photo = $photoPath;
        }

        $candidate->save();

        return redirect()->route('candidates.index')->with('success', 'Candidat mis à jour avec succès.');
    }

    /**
     * Supprimer un candidat.
     */
    public function destroy(Candidate $candidate)
    {
        // Supprimer l'ancienne photo si elle existe
        if ($candidate->photo) {
            \Storage::delete('public/' . $candidate->photo);
        }

        $candidate->delete();

        return redirect()->route('candidates.index')->with('success', 'Candidat supprimé avec succès.');
    }
}
