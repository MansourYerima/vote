<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperCandidate
 */
class Candidate extends Model
{
    protected $fillable = ['name', 'programme', 'photo', 'votes_count'];


    public function postes(): BelongsToMany
    {
        return $this->belongsToMany(Poste::class,'candidate_poste');
    }


    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function totalVotes()
    {
        return $this->votes()->count();
    }

}

