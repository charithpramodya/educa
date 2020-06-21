<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

use App\Exam;


use App\Traits\ImageUpload;

class AdminProfileExamController extends Controller
{

    use ImageUpload;


    public function __construct(){
        $this->middleware(['auth','admin']);
    }

    public function showExamtList(){
        $exams=Exam::with('image')->get();

        return view('admin.exams',['exams'=>$exams]);
    }

    public function addExam(Request $request){

        $request->validate([
            'examname' => ['required', 'string'],
            'image'=>['image']
            
        ]);

        $faker=Faker::create();

        $exam=Exam::create([
            'fid'=>$faker->unique()->md5,
            'en_name'=>$request['examname']
        ]);
        
        if(!$request['image']==null){
            $img_id=$this->submitImage($request['image']);
            $exam->image_id=$img_id;
            $exam->save();

        }

        return redirect(route('get-admin-profile-exam'))->with('success', 'Question Updated..!');
    }

    public function removeExam(Request $request){
        
        $exam=Exam::where('fid',$request['id'])->first();


        if($exam->image_id!=0){
            $this->deleteImage($exam->image_id);
        }
        
        $exam->delete();


        return redirect(route('get-admin-profile-exam'))->with('success', 'Deletion Successful..!');


    }
}
