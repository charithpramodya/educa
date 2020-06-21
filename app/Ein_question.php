<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ein_question extends Model
{
    public function module()
    {
        return $this->belongsTo('App\Module','module_id');
    }

    public function quiz()
    {
        return $this->belongsTo('App\Quiz','quiz_id');
    }
}
