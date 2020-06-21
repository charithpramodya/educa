<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    protected $fillable = ['code','count','num_of_quizes','remain'];

    public function student()
    {
        return $this->belongsToMany('App\Student', 'redeems', 'coupon_id', 'student_id');
    }
}
