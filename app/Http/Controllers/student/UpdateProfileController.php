<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use Auth;
use App\Traits\ImageUpload;

class UpdateProfileController extends Controller
{
    use ImageUpload;

    public function __construct(){
        $this->middleware(['auth','student']);
    }

    public function update(Request $request){

        
        $this->validator($request->all())->validate();

        if(!is_null($request['image'])){
            $path=$this->updateProfilePic($request['image']);
            $data=[
                'name'=>$request['name'],
                'email'=>$request['email'],
                'image_path'=>$path
            ];
        }else{
            $data=[
                'name'=>$request['name'],
                'email'=>$request['email']
            ];
        } 

        $user=User::where('id',Auth::user()->id)->update($data);
        $student=Auth::user()->student()->first();

        $student->tpno=$request['telephone'];
        $student->exam_id=$request['exam_type'];
        $student->save();

        return redirect(route('get-student-profile'))->with('success','successfully updated');
    }

    protected function validator(array $data)
    {
    
        $rules=[
            'name' => ['required', 'string', 'max:255'],
            'telephone'=>['required', 'string', 'min:10','max:10'],
            'exam_type'=>['required','integer','exists:exams,id'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg']
        ];

        if($data['email']!=Auth::user()->email){
            $rules['email']=['required', 'string', 'email', 'max:255', 'unique:users'];
        }
        return Validator::make($data, $rules);
    }
}
