<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Module;
use App\Subject;

use Faker\Factory as Faker;

class AdminProfileModuleController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','admin']);
    }

    public function showModules(){

        $modules=Module::with('subject')->get();
        $subjects=Subject::all(['fid','en_name']);

        return view('admin.modules',['modules'=>$modules, 'subjects'=>$subjects]);
    }

    public function removeModule(Request $request){


        $module=Module::where('fid',$request['id'])->first();

        if(is_null($module)){
            return redirect(route('get-admin-profile-module'))->with('error', 'Module Cannot find..!');
        }

        $module->delete();

        return redirect(route('get-admin-profile-module'))->with('success', 'Module Deleted..!');
    }

    public function addModule(Request $request){
        $request->validate([

            'modulename' => ['required', 'string'],
            'subject' => ['required', 'string','exists:subjects,fid'],
        ]);

        $subject=Subject::where('fid',$request['subject'])->first('id');

        $data=$request->all();

        $faker=Faker::create();

        $module=Module::create([
            'fid'=> $faker->unique()->md5,
            'en_name'=> $data['modulename'],
            'subject_id' => $subject['id']
        ]);

        return redirect(route('get-admin-profile-module'))->with('success', 'Module Created..!');
    }
}
