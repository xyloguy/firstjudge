<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'score';
    //
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function round()
    {
        return $this->belongsTo('App\Round');
    }
}
