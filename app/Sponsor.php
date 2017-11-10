<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    //
    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }
}
