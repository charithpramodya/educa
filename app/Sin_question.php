<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sin_question extends Model
{
    

    protected $fillable = ['fid','question','ans1','ans2','ans3','ans4','ans5','correct_and','quiz_id','module_id','review','img_url','review_img'];

    public function module()
    {
        return $this->belongsTo('App\Module','module_id');
    }

    public function quiz()
    {
        return $this->belongsTo('App\Quiz','quiz_id');
    }
}
