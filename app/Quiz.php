<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{


    protected $fillable = ['author_id','subject_id','name','type','privacy','alias','price'];


    public function subject()
    {
        return $this->belongsTo('App\Subject','subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher','author_id');
    }

    public function clas()
    {
        return $this->belongsTo('App\Clas','class_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\Quiz','quiz_student','id','student_id')->withPivot('id','all_questions')->withTimestamps();
    }

    public function module()
    {
        return $this->belongsTo('App\Module','id');
    }

    public function user(){
        return $this->belongsTo('App\User','author_id');
    }

    public function image(){
        return $this->belongsTo('App\Images','image_id');
    }
}
