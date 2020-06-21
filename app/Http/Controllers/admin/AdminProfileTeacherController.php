<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\Teacher;
use App\Subject;
use App\User;

use Faker\Factory as Faker;

use App\Traits\ImageUpload;

class AdminProfileTeacherController extends Controller
{

    use ImageUpload;

    public function __construct(){
        $this->middleware(['auth','admin']);
    }

    public function showTeacherList(){

        $teachers=Teacher::with('user')->with('subject')->get();

        $subjects=Subject::all();

        //return $teachers;
        return view('admin.teachers',['teachers'=>$teachers,'subjects'=>$subjects]);
    }

    public function approveTeacher(){

    }

    public function TeacherDelete(){

    }

    public function addTeacher(Request $request){

        $request->validate([
            'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|string|email',
            'tpno' => 'required|string|min:10|max:10',
            'accountno' => 'required|string',
            'subject' => 'required',
            'image'=>'image'
        ]);
        
        $data=$request->all();

        $faker=Faker::create();

        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['email']),
            'fid' => $faker->unique()->sha1,
            'type'=>'TCH'
        ]);
        

        $subject=Subject::where('fid',$request['subject'])->first();

        $teacher=Teacher::create([
            'user_id'=>$user->id,
            'tpno'=>$data['tpno'],
            'accno'=>$data['accountno'],
            'subject_id'=>$subject->id
        ]);
            
        
        if(!$data['image']==null){
            $imgpath=$this->submitProfilePic($data['image']);

            $user->image_path=$imgpath;
            $user->save();
        }
        

        return redirect(route('get-admin-profile-teacher'));
    }

    
}
