<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperVote
 */
class Vote extends Model
{
    protected $fillable = ['user_id', 'candidate_id',"poste_id"];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class, 'poste_id');
    }
}
