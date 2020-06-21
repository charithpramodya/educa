<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    
    protected $fillable = ['en_name','image_id', 'fid'];

    public function streams()
    {
        return $this->hasMany('App\Stream','exam_id');
    }

    public function image(){
        return $this->belongsTo('App\Images','image_id');
    }
}
