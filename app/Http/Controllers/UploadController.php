<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Images;
use Image;
use Storage;
use File;

class UploadController extends Controller
{
    
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function showForm(){
        return view('teacher.upload');
    }

    public function submitImage($file){

        
        $uploadcount=rand();
        $filename = time() . $uploadcount . '.' . $file->getClientOriginalExtension();

        $image=Image::make($file);

        

        $imgPath=time().$file->getClientOriginalName();

        $image->save($imgPath);

        Storage::put('/photos/'.$imgPath, (string)$image);

        $newImage=new Images();
        $newImage->path=$imgPath;
        $newImage->save();


        return $newImage->id;


    }
}
