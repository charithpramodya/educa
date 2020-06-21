<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Student;
use Auth;
use App\Subject;
use App\Exam;
use DB;

class StudentProfileController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth','student']);
    }

    public function showDashboardPage(){

        
        $attended_subjects=Student::where('user_id',Auth::user()->id)->first()->subjects()->get();

        $subject_ids=[];
        foreach($attended_subjects as $subject){
            $subject_ids[]=$subject->id;
        }
        
        $all_subjects=Subject::whereNotIn('id',$subject_ids)->get();

        return view('student.dashboard',['attended_subjects'=>$attended_subjects,'all_subjects'=>$all_subjects]);
    }

    public function showHistory(){

        $student_id=Auth::user()->id;
        $quizes=DB::table('quiz_student')->where('student_id',$student_id)
        ->join('take_quiz','quiz_student.id','=','take_quiz.take_id')
        ->join('quizzes', 'quiz_student.quiz_id','=','quizzes.id')
        ->join('subjects','subjects.id','=','quizzes.subject_id')
        ->select('quizzes.image_id','quizzes.name','subjects.en_name','quiz_student.all_questions','take_quiz.correct_answers')->get();

        
        return view('student.history',['quizes'=>$quizes]);
    }

    public function showProfilePage(){
        $exams=Exam::all();
        return view('student.profile',['exams'=>$exams]);
    }

}
