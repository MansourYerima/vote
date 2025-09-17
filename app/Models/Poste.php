<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Poste extends Model
{
    public function candidates():BelongsToMany
    {
        return $this->belongsToMany(Candidate::class, 'candidate_poste');
    }

    public function votesCount()
    {
        return $this->candidats->sum(fn($candidat) => $candidat->totalVotes());
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'poste_id');
    }

}


