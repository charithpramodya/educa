<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Student;
use App\Coupon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Faker\Factory as Faker;
use App\Images;
use App\Exam;

use App\Traits\ImageUpload;

class StudentRegisterController extends Controller
{
    use RegistersUsers;
    use ImageUpload;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'student/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telephone'=>['required', 'string', 'min:10','max:10'],
            'exam_type'=>['required','integer','exists:exams,id'],
            'image' => ['image','mimes:jpeg,png,jpg']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $faker=Faker::create(); 

        $user=User::create([
            'name' => $data['firstname'].' '.$data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'fid' => $faker->unique()->sha1,
            'type'=>'STD',
            'image_id'=>0,
        ]);
        
        $student=Student::create([
            'user_id'=>$user->id,
            'tpno'=>$data['telephone'],
            'exam_id'=>$data['exam_type']
        ]);

        
        $imgpath=$this->submitProfilePic($data['image']);

        $user->image_path=$imgpath;
        $user->save();

        
        return $user;
    }

    public function showRegistrationForm($coupon=null)
    {
        $exams=Exam::all();
        return view('student.register',['exams'=>$exams]);
    }
}
