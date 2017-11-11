<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    //
    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }

    public function scores(): HasMany
    {
        return $this->hasMany('App\Score');
    }

    public function scores_for_round($round_id)
    {
        $score = $this->scores()->where('round_id',$round_id)->first();
        if($score){
            return $score->round_total;
        }
        return 0;
    }

    public function highest_score()
    {
        $score = $this->scores()->max('round_total');
        if($score){
            return $score;
        }
        return 0;
    }
}
