<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

use App\Subject;
use App\Quiz;
use App\Sin_question;
use App\Coupon;
use App\Teacher;
use App\Module;
use Auth;
use Carbon\Carbon;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','student']);
        $this->middleware('attempt.quiz')->only(['startQuiz','showQuestions']);
        $this->middleware('check.subjects')->only(['showQuizes']);
        $this->middleware('check.taken.quizes')->only(['useCoupon','takeFreeQuiz',]);

    }

    public function showQuizes(){

        $student=Auth::user()->student()->first();
        $subject_ids=$student->subjects()->pluck('subject_id')->toArray();

        

        if(!$subject_ids){
             
            return redirect(route('get-show-subjects'));
            
         }

        $more=[];
        foreach($subject_ids as $subject_id){

            $subjects[]=Subject::where('id',$subject_id)->with(['quizes' => function($q) {
                $q->take(6);
            }])->first();

            //get number of rows to set vissible more button
            $count=Quiz::where('subject_id',$subject_id)->count();
            $more[$subject_id]=$count;

        }

        $teachers=Teacher::where('subject_id',$subject_ids)->with('subject')->with('user')->get();

        
        
        return view('student.quizes',['subjects'=>$subjects, 'teachers'=>$teachers, 'more'=>$more]);
    }

    public function showQuestions($alias){


        $quiz_id=Quiz::where('alias',$alias)->first(['id','subject_id']);

        $student=Auth::user()->student()->first();

        if(is_null($quiz_id)){
            return "Url is not valid";
        }

        $faker=Faker::create(); 
        $quiz=$student->quiz()->where('quiz_id',$quiz_id['id'])->get()->last();
        
        $uid=$faker->unique()->sha1;
        DB::table('take_quiz')->insert(
            ['take_id' => $quiz->pivot->id, 'OTI' => $uid]
        );

        
        $questions=Sin_question::where('quiz_id',$quiz_id['id'])->get();

        return view('student.questions',['questions'=>$questions, 'alias'=>$alias,'uid'=>$uid]);
    }

    public function showQuiz($alias){

        $quiz=Quiz::where('alias',$alias)->with('subject')->first();
        
        if(is_null($quiz)){
            return "Url is not valid";
        }
        $student=Auth::user()->student()->first();
        $res=$student->quiz()->where('quiz_id',$quiz->id)->exists();

        if($res){

            return redirect(route('get-student-start-quiz',['alias'=>$alias]));
        }

        
        return view('student.quiz',['quiz'=>$quiz,'free_quizes'=>$student->free_quizes]);
    }

    public function useCoupon($alias){
       
        
        $quiz=Quiz::where('alias',$alias)->first();  
        $student=Auth::user()->student()->first();

        if(is_null($quiz)){
            return redirect(route('get-student-show-quiz',['alias'=>$alias]));
        }

        if($student->free_quizes > 0){
            $student->quiz()->attach($quiz->id);
            $student->free_quizes-=1;
            $student->save();
            return redirect(route('get-student-start-quiz',['alias'=>$alias]));
        }
        
        return redirect(route('get-student-show-quiz',['alias'=>$alias]));

    }

    public function showStartQuiz($alias){

        $quiz=Quiz::where('alias',$alias)->with('subject')->first();

        if(is_null($quiz)){
            return "Url is not valid";
        }

        $taken_quizes=Auth::user()->student()->first()->quiz()->pluck('quiz_id')->toArray();

        if(!in_array( $quiz->id, $taken_quizes)){
            return redirect(route('get-student-show-quiz',['alias'=>$alias]));
        }

        
        return view('student.quiz-start',['quiz'=>$quiz]);
    }


    public function checkAnswers(Request $request){

        $quiz=Quiz::where('alias',$request['alias'])->first();


        $student=Auth::user()->student()->first();
        $questions=Sin_question::where('quiz_id',$quiz->id)->get();
        $correct_ans = 0;

        $subject=Subject::where('id',$quiz->subject_id)->first();

        $module=null;
        if(is_null($quiz->module_id)){
            $module=Module::where('id',$quiz->module_id)->with('subject')->first();
        }

        $take_quiz=DB::table('take_quiz')->where('OTI',$request['uid'])->first();



        foreach($questions as $question){

            if($request[$question->fid] == $question->correct_and){

                $correct_ans += 1;

            }
        
        }
        

        if(($take_quiz->OTI==$request['uid'])){

                if($take_quiz->submit==0){
                    $student->quiz()->updateExistingPivot($quiz->id,['all_questions'=>10]);
                    DB::table('take_quiz')->where('OTI',$request['uid'])->update(['submit' => 1,'correct_answers'=>$correct_ans]);
                    

                    $res=[];
                    foreach($questions as $question){

                        $result=0;
                        if($request[$question->fid] == $question->correct_and){
            
                            $result=1;
            
                        }

                        $res[]=['student_id'=>$student->user_id, 'quiz_student_id'=>$take_quiz->id,'question_id'=>$question->id,'correct'=>$result, 'module_id'=>1,'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()];
                    
                    }

                    DB::table('quiz_student_question')->insert($res);

                }

        }else{
            abort(404);
        }
            
        $percentage=0;

        if(!count($questions)==0){
            $percentage = ($correct_ans / count($questions)) * 100;
        }

        $data=array(
            'percentage'=>$percentage,
            'answers'=>$request->post(),
            'questions'=>$questions,
            'module'=>$module,
            'subject'=>$subject

        );

        return view('student.correct-answers',$data);
        //return $request['alias'];
    }

    public function takeFreeQuiz($alias){

        $quiz=Quiz::where('alias',$alias)->first();

        $student=Auth::user()->student()->first();

        if(is_null($quiz)){
            return redirect(route('get-student-show-quiz',['alias'=>$alias]));
        }

        $student->quiz()->attach($quiz->id);
        $student->save();
        return redirect(route('get-student-start-quiz',['alias'=>$alias]));

    }

    public function takePaidQuiz(){
        //this should be add to check.taken.quizes middleware
        return 'PAID';
    }


    
}
