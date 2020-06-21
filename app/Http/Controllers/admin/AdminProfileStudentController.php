<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Student;
use App\User;

class AdminProfileStudentController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','admin']);
    }

    public function showStudentList(){
        $students=Student::with('user')->get();
       
        return $students;
    }

    public function StudentDelete(){
        
    }
}
