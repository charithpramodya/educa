<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $fillable = ['fid','en_name','exam_id','image_id'];
    
    public function modules()
    {
        return $this->hasMany('App\Module');
    }

    public function teachers()
    {
        return $this->belongsTo('App\Teacher','subject_id');
    }

    public function student()
    {
        return $this->belongsToMany('App\Student','subject_student','student_id')->withPivot('subject_id');
    }

    public function quizes(){
        return $this->hasMany('App\Quiz','subject_id');
    }

    public function exam(){
        return $this->belongsTo('App\Exam','exam_id');
    }

    public function image(){
        return $this->belongsTo('App\Images','image_id');
    }
}
