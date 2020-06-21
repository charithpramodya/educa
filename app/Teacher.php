<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table='teachers';

    protected $fillable = ['user_id','tpno','accno','subject_id'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function subject()
    {
        return $this->hasOne('App\Subject','id');
    }
}
