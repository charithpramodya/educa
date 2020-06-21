<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['user_id','tpno','exam_id','stream_id'];

    protected $primaryKey = 'user_id';
    

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function clas()
    {
        return $this->belongsToMany('App\Clas','class_student','id','student_id');
    }

    public function quiz()
    {
        return $this->belongsToMany('App\Quiz','quiz_student','student_id','quiz_id')->withPivot('id','all_questions')->withTimestamps();
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject', 'subject_student', 'student_id', 'subject_id');
    }

    public function coupons()
    {
        return $this->belongsToMany('App\Coupon', 'redeems', 'student_id', 'coupon_id');
    }
}
