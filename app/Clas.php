<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    protected $table="classes";


    public function students()
    {
        return $this->belongsToMany('App\Clas','class_student','id','class_id');
    }


}
