<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use Auth;
use App\Subject;

use Storage;


class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','student']);
    }

    public function addSubject(Request $request){
        
        $subject=Subject::where('fid',$request->input('id'))->first();

        if(!$subject){
            return "INVALID";
        }

        $student=Student::where('user_id',Auth::user()->id)->first();

        $student->subjects()->attach($subject->id);
        
        $subjects=$student->subjects->get(['fid','en_name']);

        return 'SUCCESS';
       // return $student;
        //$student->subjects()->save();
       // return redirect(route('get-student-profile'));

    
    }

    public function showAddSubjectForm(){
        //$subjects=Subject::all();

        $student=Auth::user()->student()->first();
        $taken_subjects=$student->subjects()->get();

        $subject_ids=$student->subjects()->pluck('subject_id')->toArray();
        $subjects=Subject::whereNotIn('id',$subject_ids)->get();

        
       // return $student->subjects()->get();

        return view('student.add-subjects',['subjects'=>$subjects, 'taken_subjects'=>$taken_subjects]);
    }


  
}
