<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }

    public function scores()
    {
        return $this->hasMany('App\Score');
    }
}
