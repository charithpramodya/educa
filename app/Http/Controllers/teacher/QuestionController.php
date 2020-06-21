<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Faker\Factory as Faker;

use App\Sin_question;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','teacher']);
    }

    public function showQuestions(Request $request){

        $quiz_id=$request->input('id');
        $questions=Sin_question::where('quiz_id',$quiz_id)->get();
        return view('teacher.questions',['questions'=>$questions,'id'=>$quiz_id]);
    }

    public function addQuestions(Request $request){
        
        $faker=Faker::create(); 

        $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer1' => ['required', 'string'],
            'answer2' => ['required', 'string'],
            'answer3'=>['required', 'string'],
            'answer4'=>['required','string'],
            'answer5'=>['required','string'],
            'correct_ans'=>['required','string'],
            'id'=>['required','integer']
            
        ]);

        $data=$request->all();

        $question=Sin_question::create([
            'fid'=>$faker->unique()->sha1,
            'question'=>$data['question'],
            'ans1'=>$data['answer1'],
            'ans2'=>$data['answer2'],
            'ans3'=>$data['answer3'],
            'ans4'=>$data['answer4'],
            'ans5'=>$data['answer5'],
            'correct_and'=>$data['correct_ans'],
            'quiz_id'=>$data['id']

        ]);

        $questions=Sin_question::where('quiz_id',$data['id'])->get();
        return view('teacher.questions',['questions'=>$questions,'id'=>$data['id']]);


    }
}
