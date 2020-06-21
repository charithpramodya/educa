<?php
 
namespace App\Traits;

use Image;
use Storage;
use App\Images;
use Auth;

use Faker\Factory as Faker;

trait ImageUpload {
 
    public function submitImage($file) {

        
        $image=Image::make($file);

        
        $faker=Faker::create();
        $imgPath=time() . $faker->unique()->md5 . '.' . $file->getClientOriginalExtension();

        

        $image->save(storage_path('app\public\images\\'.$imgPath,80));

       // Storage::put('/public/images/'.$imgPath, (string)$image);

        $newImage=new Images();
        $newImage->path=$imgPath;
        $newImage->save();


        return $newImage->id;
    }

    public function UpdateImage($file,$Img_id) {

        $current_img=Images::where('id',$Img_id)->first();

        if($Img_id!=0){
            Storage::delete('public\images\\'.$current_img->path);
        }
        


        
        $image=Image::make($file);

        
        $faker=Faker::create();
        $imgPath=time() . $faker->unique()->md5 . '.' . $file->getClientOriginalExtension();;

        

        $image->save(storage_path('app\public\images\\'.$imgPath,80));

        //Storage::put('/public/images/'.$imgPath, (string)$image);

        $newImage=new Images();
        $newImage->path=$imgPath;
        $newImage->save();



        return $newImage->id;
    }

    

    public function submitProfilePic($file) {

       

        $image=Image::make($file);

        $faker=Faker::create();
        $imgPath=time() . $faker->unique()->md5 . '.' . $file->getClientOriginalExtension();

        $image->resize(250, 250);

        $image->save(storage_path('app\public\images\\'.$imgPath));

        //Storage::put('/public/images/'.$imgPath, (string)$image);

        $newImage=new Images();
        $newImage->path=$imgPath;
        $newImage->save();


        return $imgPath;
    }

    public function updateProfilePic($file) {


        $current_path=Auth::user()->image_path;

        Storage::delete('public\images\\'.$current_path);


        $image=Image::make($file);

        $faker=Faker::create();
        $imgPath=time() . $faker->unique()->md5 . '.' . $file->getClientOriginalExtension();

        $image->resize(250, 250);

        $image->save(storage_path('app\public\images\\'.$imgPath));

        //Storage::put('/public/images/'.$imgPath, (string)$image);

        $newImage=new Images();
        $newImage->path=$imgPath;
        $newImage->save();


        return $imgPath;
    }

    public function deleteImage($id){
        $image=Images::where('id',$id)->first();

        Storage::delete('public\images\\'.$image->path);

        $image->delete();
        
    }

    public function uploadQuestionImage($file,$type){

        $image=Image::make($file);

        $faker=Faker::create();
        $imgPath=time() . $faker->unique()->md5 . '.' . $file->getClientOriginalExtension();


        if($type=='QUESTION'){
            $image->save(storage_path('app\public\question\\'.$imgPath));
        }else{
            $image->save(storage_path('app\public\review\\'.$imgPath));
        }
            

        //Storage::put('/public/images/'.$imgPath, (string)$image);

        $newImage=new Images();
        $newImage->path=$imgPath;
        $newImage->save();


        return $imgPath;
    }


    public function updateQuestionImage($cur_file, $file,$type){




        $image=Image::make($file);

        $faker=Faker::create();

        if($cur_file!=null){

            if($type=='QUESTION'){
                
                Storage::delete('public\question\\'.$cur_file);
            }else{
                Storage::delete('public\review\\'.$cur_file);
            }
        }


        $imgPath=time() . $faker->unique()->md5 . '.' . $file->getClientOriginalExtension();


        if($type=='QUESTION'){
            $image->save(storage_path('app\public\question\\'.$imgPath));
        }else{
            $image->save(storage_path('app\public\review\\'.$imgPath));
        }
            

        //Storage::put('/public/images/'.$imgPath, (string)$image);

        $newImage=new Images();
        $newImage->path=$imgPath;
        $newImage->save();


        return $imgPath;
    }

    
 
}