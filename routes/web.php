<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('welcome');



Route::get('/quizes','HomeController@showQuizes')->name('get-show-quizes');
//student route

Route::post('/student/register','student\StudentRegisterController@register')->name('post-student-register');
Route::get('/student/register','student\StudentRegisterController@showRegistrationForm')->name('get-student-register');

Route::get('/student/dashboard','student\StudentProfileController@showDashboardPage')->name('get-student-dashboard');
Route::get('/student/profile','student\StudentProfileController@showProfilePage')->name('get-student-profile');
Route::post('/student/profile','student\UpdateProfileController@update')->name('post-student-profile');

Route::get('/student/login','student\StudentLoginController@showLoginForm')->name('get-student-login');
Route::post('/student/login','student\StudentLoginController@login')->name('post-student-login');

Route::post('/student/logout','student\StudentLoginController@logout')->name('post-student-logout');

Route::get('/student/password/reset', 'student\ForgotPasswordController@showLinkRequestForm')->name('get-student-password-request-form');
Route::post('/student/password/email', 'student\ForgotPasswordController@sendResetLinkEmail')->name('post-student-password-email');
Route::get('/student/password/reset/{token}', 'student\ResetPasswordController@showResetForm')->name('get-student-password-reset-form');
Route::post('/student/password/reset', 'student\ResetPasswordController@reset')->name('post-student-password-update');


Route::get('/student/password/confirm', 'student\ConfirmPasswordController@showConfirmForm')->name('get-student-password-confirm');
Route::post('/student/password/confirm', 'student\ConfirmPasswordController@confirm')->name('post-student-password-confirm');

Route::get('/student/email/verify', 'student\VerificationController@show')->name('get-student-verification-notice');
Route::get('/student/email/verify/{id}/{hash}', 'student\VerificationController@verify')->name('get-student-verification-verify');
Route::post('/student/email/resend', 'student\VerificationController@resend')->name('post-student-verification-resend');

Route::post('/student/subject/add','student\SubjectController@addSubject')->name('post-student-add-quiz');
Route::get('/student/subject','student\SubjectController@showAddSubjectForm')->name('get-show-subjects');




Route::get('/student/quizes','student\QuestionController@showQuizes')->name('get-student-show-quizes');
//Route::post('/student/quizes','student\QuestionController@showQuizes')->name('post-student-show-quizes');
Route::get('/student/quiz/{alias}/use_coupon','student\QuestionController@useCoupon')->name('get-student-quize-coupon');
Route::get('/student/quiz/{alias}/free_quiz','student\QuestionController@takeFreeQuiz')->name('get-student-quize-free');
Route::post('/student/questions','student\QuestionController@showQuestions')->name('post-student-show-questions');
Route::get('/student/quiz/{alias}','student\QuestionController@showQuiz')->name('get-student-show-quiz');
Route::get('/student/quiz/{alias}/start','student\QuestionController@showStartQuiz')->name('get-student-start-quiz');
Route::get('/student/questions/{alias}','student\QuestionController@showQuestions')->name('get-student-start-questions');
Route::post('/student/correct_answers','student\QuestionController@checkAnswers')->name('get-student-check-questions');
//Route::get('/student/quiz/{alias}/activate/coupon','student\QuestionController@useCoupon')->name('get-student-quize-coupon');

Route::get('/student/history','student\StudentProfileController@showHistory')->name('get-student-quiz-history');

Route::get('/student/coupon','student\StudentProfileCouponController@showCoupon')->name('get-student-coupon');
Route::post('/student/coupon/validate','student\StudentProfileCouponController@validateCoupon')->name('post-student-coupon-validate');





//teacher's route

Route::post('/teacher/register','teacher\TeacherRegisterController@register')->name('post-teacher-register');
Route::get('/teacher/register','teacher\TeacherRegisterController@showRegistrationForm')->name('get-teacher-register');

Route::get('/teacher/profile','teacher\TeacherProfileController@showProfilePage')->name('get-teacher-profile');

Route::get('/teacher/login','teacher\TeacherLoginController@showLoginForm')->name('get-teacher-login');
Route::post('/teacher/login','teacher\TeacherLoginController@login')->name('post-teacher-login');

Route::get('/teacher/logout','teacher\TeacherLoginController@logout')->name('post-teacher-logout');


Route::get('/teacher/password/reset', 'teacher\ForgotPasswordController@showLinkRequestForm')->name('get-teacher-password-request-form');
Route::post('/teacher/password/email', 'teacher\ForgotPasswordController@sendResetLinkEmail')->name('post-teacher-password-email');
Route::get('/teacher/password/reset/{token}', 'teacher\ResetPasswordController@showResetForm')->name('get-teacher-password-reset-form');
Route::post('/teacher/password/reset', 'teacher\ResetPasswordController@reset')->name('post-teacher-password-update');


Route::get('/teacher/password/confirm', 'teacher\ConfirmPasswordController@showConfirmForm')->name('get-teacher-password-confirm');
Route::post('/teacher/password/confirm', 'teacher\ConfirmPasswordController@confirm')->name('post-teacher-password-confirm');

Route::get('/teacher/email/verify', 'teacher\VerificationController@show')->name('get-teacher-verification-notice');
Route::get('/teacher/email/verify/{id}/{hash}', 'teacher\VerificationController@verify')->name('get-teacher-verification-verify');
Route::post('/teacher/email/resend', 'teacher\VerificationController@resend')->name('post-teacher-verification-resend');


Route::get('/teacher/quizes','teacher\QuizeController@showQuizes')->name('get-show-quizes-form');
Route::post('/teacher/quizes/add','teacher\QuizeController@addQuizes')->name('post-add-quizes');


//should remove in production
Route::get('/teacher/upload','teacher\UploadController@showForm')->name('get-upload-form');
Route::post('/teacher/upload','teacher\UploadController@submitImage')->name('post-upload-form');

Route::post('/teacher/questions','teacher\QuestionController@showQuestions')->name('post-show-questions');
Route::post('/teacher/questions/add','teacher\QuestionController@addQuestions')->name('post-add-questions');











//Admin Routes
Route::prefix('admin/lord/eedudash')->group(function () {

  // Route::post('/register','teacher\TeacherRegisterController@register')->name('post-admin-register');
  //  Route::get('/register','teacher\TeacherRegisterController@showRegistrationForm')->name('get-admin-register');

    Route::get('/login','admin\AdminLoginController@showLoginForm')->name('get-admin-login');
    Route::post('/login','admin\AdminLoginController@login')->name('post-admin-login');

    Route::get('/dashboard','admin\AdminProfileController@showdashboardPage')->name('get-admin-dashboard');

    Route::get('/profile','admin\AdminProfileController@showProfilePage')->name('get-admin-profile');


    Route::get('/profile/students','admin\AdminProfileStudentController@showStudentList')->name('get-admin-profile-student');
    Route::post('/profile/students/delete','admin\AdminProfileStudentController@StudentDelete')->name('get-admin-profile-student-delete');

    Route::get('/profile/teacher','admin\AdminProfileTeacherController@showTeacherList')->name('get-admin-profile-teacher');
    Route::post('/profile/teacher/add','admin\AdminProfileTeacherController@addTeacher')->name('get-admin-profile-add-teacher');
    Route::post('/profile/teacher/approve','admin\AdminProfileTeacherController@approveTeacher')->name('get-admin-profile-teacher-approve');
    Route::post('/profile/teacher/delete','admin\AdminProfileTeacherController@TeacherDelete')->name('get-admin-profile-teacher-delete');

    Route::get('/profile/subjects','admin\AdminProfileSubjectController@showSubjecttList')->name('get-admin-profile-subject');
    Route::post('/profile/subjects/add','admin\AdminProfileSubjectController@addSubject')->name('post-admin-profile-subject-add');
    Route::post('/profile/subjects/remove','admin\AdminProfileSubjectController@removeSubject')->name('get-admin-profile-subject-remove');

    Route::get('/profile/exams','admin\AdminProfileExamController@showExamtList')->name('get-admin-profile-exam');
    Route::post('/profile/exams/add','admin\AdminProfileExamController@addExam')->name('post-admin-profile-exam-add');
    Route::post('/profile/exams/remove','admin\AdminProfileExamController@removeExam')->name('get-admin-profile-exam-remove');

    Route::get('/profile/coupons','admin\AdminProfileCouponsController@showCouponList')->name('get-admin-profile-coupon');
    Route::post('/profile/coupons/add','admin\AdminProfileCouponsController@addCoupon')->name('get-admin-profile-coupon-add');
    Route::post('/profile/coupons/remove','admin\AdminProfileCouponsController@removeCoupon')->name('get-admin-profile-coupon-remove');

    Route::get('/profile/quizes','admin\AdminProfileQuizController@showQuizetList')->name('get-admin-profile-quiz');
    Route::post('/profile/quizes/add','admin\AdminProfileQuizController@createQuiz')->name('post-admin-profile-quiz-add');

    Route::get('/profile/quizes/{alias}/update','admin\AdminProfileQuizController@showUpdate')->name('get-admin-profile-quiz-update');
    Route::post('/profile/quizes/update','admin\AdminProfileQuizController@Updatequiz')->name('post-admin-profile-quiz-update');
    
    Route::post('/profile/quizes/get','admin\AdminProfileQuizController@getQuiz')->name('post-admin-profile-quiz-get');
    Route::post('/profile/quizes/remove','admin\AdminProfileQuizController@removeQuize')->name('get-admin-profile-quiz-remove');
    Route::post('/profile/quizes/questions','admin\AdminProfileQuizController@showQuestionList')->name('get-admin-profile-quiz-questions');

    Route::get('/profile/modules','admin\AdminProfileModuleController@showModules')->name('get-admin-profile-module');
    Route::post('/profile/module/remove','admin\AdminProfileModuleController@removeModule')->name('post-admin-profile-module-remove');
    Route::post('/profile/module/add','admin\AdminProfileModuleController@addModule')->name('post-admin-profile-module-add');
    

    Route::get('/profile/{alias}/questions','admin\AdminProfileQuizController@showQuestions')->name('get-admin-profile-quiz-questions');
    Route::post('/profile/questions/add','admin\AdminProfileQuizController@addQuestions')->name('post-admin-profile-quiz-questions-add');

    Route::get('/profile/question/{alias}','admin\AdminProfileQuizController@showQuestion')->name('get-admin-profile-quiz-question');
    Route::post('/profile/question/update','admin\AdminProfileQuizController@updateQuestion')->name('post-admin-profile-quiz-question-update');


    Route::get('/logout','admin\AdminLoginController@logout')->name('post-admin-logout');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/redirect','HomeController@homeRedirect')->name('home-redirect');
