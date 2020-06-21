<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Subject;
use App\Exam;

use Faker\Factory as Faker;

use App\Traits\ImageUpload;

class AdminProfileSubjectController extends Controller
{

    use ImageUpload;

    public function __construct(){
        $this->middleware(['auth','admin']);
    }

    public function showSubjecttList(){

        $subjects=Subject::with('exam')->with('image')->get();
        $exams=Exam::all();

        //return $subjects;
        return view('admin.subjects',['subjects'=>$subjects,'exams'=>$exams]);
    }

    public function addSubject(Request $request){

        $request->validate([
            'subject_name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'exam_type' => 'integer',
            'image'=>'image'
        ]);
        
        $faker=Faker::create();

        $subject=Subject::create([
            'fid'=>$faker->unique()->sha1,
            'en_name'=>$request['subject_name'],
            'exam_id'=>$request['exam_type']
        ]);
            
        if(!$data['image']==null){
            $image_id=$this->submitImage($request['image']);

            $subject->image_id=$image_id;
            $subject->save();
        }


        return redirect(route('get-admin-profile-subject'));
    }

    public function removeSubject(){
        
    }
}
