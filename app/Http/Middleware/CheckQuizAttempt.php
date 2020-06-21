<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Quiz;


class CheckQuizAttempt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $alias=$request->route('alias');
        $quiz=Quiz::where('alias',$alias)->first();

        if(is_null($quiz)){
            abort(404);
        }
        $student=Auth::user()->student()->first();
        $res=$student->quiz()->where('quiz_id',$quiz->id)->exists();
        
        if($res){
           // print_r($res);
           //echo $res;
            return $next($request);
        }

        return redirect(route('get-student-show-quiz',['alias'=>$alias]));
        
    }
}
