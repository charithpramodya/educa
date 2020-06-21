<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Teacher;
use App\User;
use Auth;

use App\Subject;
use App\Quiz;

class HomeController extends Controller
{

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return User::find(1)->teacher;

        //return view('home');
    }

    public function homeRedirect(){

        if(Auth::check()){

            if(Auth::user()->type =='STD'){
                return redirect('/student/profile')->with('error','You have not teacher access');
            }else if(Auth::user()->type =='TCH'){
                return redirect('/teacher/profile')->with('error','You have not student access');
            }else if(Auth::user()->type =='ADMIN'){
                return redirect('/admin/lord/eedudash/profile');
            }

        }else{
            return redirect('/')->with('error','Please login first');
        }
    }


    public function showQuizes(){


        if(!Auth::check()){

            $subjects=Subject::all();
            $free_quizes=Quiz::where('type','FREE')->with('subject')->get();
            $paid_quizes=Quiz::where('type','PAID')->with('subject')->get();

            //return $free_quizes;

            return view('quizes',['subjects'=>$subjects,'free_quizes'=>$free_quizes,'paid_quizes'=>$paid_quizes]);
        }

        if(Auth::user()->type=='STD'){
            return redirect(route('get-student-show-quizes'));

        }else if(Auth::user()->type=='TCH'){
            return redirect(route('get-teacher-show-quizes'));
        }
        
    }
}
