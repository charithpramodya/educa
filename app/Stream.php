<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    public function subjects()
    {
        return $this->hasMany('App\Subject','stream_id');
    }
}
