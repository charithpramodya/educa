<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Quiz;

class CheckTakenQuizes
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

        $taken_quizes=Auth::user()->student()->first()->quiz()->pluck('quiz_id')->toArray();

        if(in_array( $quiz->id, $taken_quizes)){
            return redirect(route('get-student-start-quiz',['alias'=>$alias]));
        }

        return $next($request);
    }
}
