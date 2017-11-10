<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    //
    public function sponsors()
    {
        return $this->hasMany('App\Sponsor');
    }

    public function teams()
    {
        return $this->hasMany('App\Team');
    }

    public function rounds()
    {
        return $this->hasMany('App\Round');
    }
}
