<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    

    protected $fillable = ['fid','en_name','subject_id'];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function quizzes(){
        return $this->hasMany('App\Quiz','module_id');
    }
}
