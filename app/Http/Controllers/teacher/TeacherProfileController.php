<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','teacher']);
    }

    public function showProfilePage(){
        return view('teacher.profile');
    }
}
