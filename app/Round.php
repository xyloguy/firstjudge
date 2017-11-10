<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    //
    public function scores()
    {
        return $this->hasMany('App\Score');
    }
}
