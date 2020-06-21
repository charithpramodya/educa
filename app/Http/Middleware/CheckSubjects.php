<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckSubjects
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
        $subjects=Auth::user()->student()->first()->subjects()->get();
        if(isset($subjects)){
            return $next($request);
        }else{
            return redirect(route('get-show-subjects'));
        }
        
    }
}
