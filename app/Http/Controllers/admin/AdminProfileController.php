<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{

    public function __construct(){
        $this->middleware(['auth','admin']);
    }
    public function showProfilePage(){
        return view('admin.profile');
    }

    public function showdashboardPage(){
        return view('admin.dashboard');
    }
}
