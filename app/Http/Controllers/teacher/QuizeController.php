<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

use App\Quiz;
use App\Subject;
use Auth;


class QuizeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','teacher']);
    }

    public function showQuizes(){

        $quizes=Quiz::where('author_id',Auth::user()->id)->get();
        $subjects=Subject::all();

        return view('teacher.quize',['quizes'=>$quizes,'subjects'=>$subjects]);
    }

    public function addQuizes(Request $request){
        
        $faker=Faker::create();


        $request->validate([
            'subject' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'type' => ['required', 'string'],
            'privacy'=>['required', 'string'],
            
        ]);

        $data=$request->all();

        $question=Quiz::create([
            'author_id'=>Auth::user()->id,
            'subject_id'=>$data['subject'],
            'alias'=>$faker->unique()->md5,
            'name'=>$data['name'],
            'type'=>$data['type'],
            'privacy'=>$data['privacy'],

        ]);



        $quizes=Quiz::where('author_id',Auth::user()->id)->get();
        $subjects=Subject::all();

        return view('teacher.quize',['quizes'=>$quizes,'subjects'=>$subjects]);


    }
}
