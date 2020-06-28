<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Quiz;
use App\Sin_question;
use App\Subject;
use Faker\Factory as Faker;
use App\Module;


use Auth;

use App\Traits\ImageUpload;

class AdminProfileQuizController extends Controller
{
    use ImageUpload;

    public function __construct(){
        $this->middleware(['auth','admin']);
    }

    public function showQuizetList(){
        $quizes=Quiz::with('user')->with('subject')->with('image')->get();
        $subjects=Subject::all();

        return view('admin.quizzes',['quizes'=>$quizes, 'subjects'=>$subjects]);
    }

    public function removeQuize(Request $request){
        $quiz_id=$request->input('id');
    }

    public function showQuestionList(Request $request){
        $quiz_id=$request->input('id');
        $questions=Sin_question::where('quiz_id')->get();
        return $questions;
    }


    public function createQuiz(Request $request){

        $faker=Faker::create();

        $request->validate([
            'subject' => ['required', 'string','exists:subjects,fid'],
            'quizname' => ['required', 'string','regex:/^[\pL\s\-]+$/u'],
            'type' => ['required', 'string','in:FREE,PAID'],
            'privacy'=>['required', 'string','in:COMMON,CLASS'],
            'quizprice'=>['integer', 'nullable'],
            'image'=>['image']
            
        ]);

        
            
         $data=$request->all();

         
        $Subject_id=Subject::where('fid',$data['subject'])->first('id');

        $arr=[
            'author_id'=>Auth::user()->id,
            'subject_id'=>$Subject_id['id'],
            'alias'=>$faker->unique()->md5,
            'name'=>$data['quizname'],
            'type'=>$data['type'],
            'privacy'=>$data['privacy'],

        ];

        if(!is_null($data['quizprice'])){
            $arr['price']=$data['quizprice'];
        }

        $quiz=Quiz::create($arr);

        if(!$request['image']==null){
            $image_id=$this->submitImage($request['image']);

            $quiz->image_id=$image_id;
            $quiz->save();
        }

        return redirect(route('get-admin-profile-quiz'));

    }

    public function showQuestions($alias){

        $quiz=Quiz::where('alias',$alias)->first(['id','subject_id']);

        $questions=Sin_question::where('quiz_id',$quiz['id'])->get();

        $modules=Module::where('subject_id',$quiz['subject_id'])->get();

        
        return view('admin.questions',['questions'=>$questions, 'alias'=>$alias, 'modules'=>$modules]);

    }

    public function addQuestions(Request $request){

        $faker=Faker::create();

        $request->validate([
            'question' => ['required', 'string'],
            'answer1'  => ['required', 'string'],
            'answer2'  => ['required', 'string'],
            'answer3'  => ['required', 'string'],
            'answer4'  => ['required', 'string'],
            'answer5'  => ['nullable', 'string'],
            'correct_answer' => ['required', 'integer'],
            'module' => ['required','string'],
            'review' => ['required','string'],
            'questionImage'=>['image'],
            'reviewImage'=>['image']
            
        ]);

        $data=$request->all();
        $module_id=Module::where('fid',$data['module'])->first('id');
        $quiz_id=Quiz::where('alias',$data['alias'])->first('id');

        
        $question=Sin_question::create([

            'fid' => $faker->unique()->md5,
            'question'=>$data['question'],
            'ans1' => $data['answer1'],
            'ans2' => $data['answer2'],
            'ans3' => $data['answer3'],
            'ans4' => $data['answer4'],
            'ans5' => $data['answer5'],
            'correct_and' => $data['correct_answer'],
            'module_id' => $module_id['id'],
            'quiz_id' => $quiz_id['id'],
            'review' => $data['review']

        ]);

        if(!$request['questionImage']==null){
            $image_path=$this->uploadQuestionImage($request['questionImage'],'QUESTION');

            $question->img_url=$image_path;
            $question->save();
        }

        if(!$request['reviewImage']==null){
            $image_path=$this->uploadQuestionImage($request['reviewImage'],'REVIEW');
            $question->review_img=$image_path;
            $question->save();

        }

        return "SUCCESS";
    }


    public function getQuiz(Request $request){
        $quiz=Quiz::where('alias',$request['id'])->with('subject')->first(['name','type','price','privacy','subject_id','alias']);

        
        return array(
            'name'=>$quiz->name,
            'type'=>$quiz->type,
            'price'=>$quiz->price,
            'privacy'=>$quiz->privacy,
            'fid'=>$quiz->subject->fid,
            'subject'=>$quiz->subject->en_name,

        );
    }

    public function showUpdate($alias){
        $quiz=Quiz::where('alias',$alias)->with('image')->first();
        $subjects_all=Subject::all(['id','fid','en_name']);

        $subjects=[];
        $selected_subject_id=null;
        foreach($subjects_all as $subject){

            $subjects[$subject->fid]=$subject->en_name;

            if ($quiz->subject_id ==  $subject->id){

                $selected_subject_id = $subject->fid;
            }
        }



        return view('admin.update-quiz',['quiz'=>$quiz, 'subjects'=>$subjects, 'selected_subject_id'=>$selected_subject_id, 'alias'=>$alias]);
    }


    public function Updatequiz(Request $request){

        $request->validate([
            'subject' => ['required', 'string','exists:subjects,fid'],
            'quizname' => ['required', 'string'],
            'type' => ['required', 'string','in:FREE,PAID'],
            'privacy'=>['required', 'string','in:COMMON,CLASS'],
            'quizprice'=>['integer', 'nullable'],
            'image'=>['image']
            
        ]);

        $data=$request->all();

        $Subject_id=Subject::where('fid',$data['subject'])->first('id');

        

        $quiz=Quiz::where('alias', $request['id'])->update([

            'subject_id'=>$Subject_id['id'],
            'name'=>$data['quizname'],
            'type'=>$data['type'],
            'price'=>$data['quizprice'],
            'privacy'=>$data['privacy'],
            
        ]);

        $quiz=Quiz::where('alias', $request['id'])->first();
        
        if(!$request['image']==null){
            $image_id=$this->UpdateImage($request['image'],$quiz->image_id);

            $quiz->image_id=$image_id;
            $quiz->save();
        }
        
       return redirect(route('get-admin-profile-quiz'))->with('success', 'Question Updated..!');
    }


    public function showQuestion($alias){

        $question=Sin_question::where('fid',$alias)->first();

        $quiz=Quiz::where('id',$question->quiz_id)->first();

        $modules_set=Module::where('subject_id',$quiz['subject_id'])->get(['fid', 'en_name']);

        $modules=[];

        foreach($modules_set as $module){
            $modules[$module->fid]=$module->en_name;
        }

        $selected_module_id=Module::where('id',$question->module_id)->first('fid');

        
        return view('admin.update-question',['question'=>$question, 'modules'=>$modules, 'selected_module_id'=>$selected_module_id, 'alias'=>$alias]);
    }


    public function updateQuestion(Request $request){

        $request->validate([
            'question' => ['required', 'string'],
            'answer1'  => ['required', 'string'],
            'answer2'  => ['required', 'string'],
            'answer3'  => ['required', 'string'],
            'answer4'  => ['required', 'string'],
            'answer5'  => ['nullable', 'string'],
            'correct_answer' => ['required', 'integer'],
            'module' => ['required','string'],
            'review' => ['required','string'],
            'questionImage'=>['image'],
            'reviewImage'=>['image']
            
        ]);


        $data=$request->all();
        
        $module=Module::where('fid',$data['module'])->first();


        $question=Sin_question::where('fid',$request['id'])->update([

            
            'question'=>$data['question'],
            'ans1' => $data['answer1'],
            'ans2' => $data['answer2'],
            'ans3' => $data['answer3'],
            'ans4' => $data['answer4'],
            'ans5' => $data['answer5'],
            'correct_and' => $data['correct_answer'],
            'module_id' => $module['id'],
            'review' => $data['review']

        ]);

        $question=Sin_question::where('fid',$request['id'])->first();

        
        if(!$request['questionImage']==null){
            $image_path=$this->updateQuestionImage($question->img_url, $request['questionImage'],'QUESTION');

            $question->img_url=$image_path;
            $question->save();
        }

        if(!$request['reviewImage']==null){
            $image_path=$this->updateQuestionImage($question->review_img, $request['reviewImage'],'REVIEW');
            $question->review_img=$image_path;
            $question->save();

        }

        $quiz_alias=Quiz::where('id',$question->quiz_id)->first('alias');


        return redirect(route('get-admin-profile-quiz-questions',$quiz_alias->alias))->with('success', 'Question Updated..!');
    }
}
