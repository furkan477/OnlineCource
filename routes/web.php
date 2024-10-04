<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Site\CertificaController;
use App\Http\Controllers\Site\CourceController;
use App\Http\Controllers\Site\EnrollmentsController;
use App\Http\Controllers\Site\ExamController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\LessonController;
use App\Http\Controllers\Site\QuizController;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Middleware\TeacherMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/merhaba-laravel-artık-kendimi-gelistirmek-ve-laravel-yeteneklerimi-ilerletmek-ve-backend-kısmında-ileri-seviye-olmak-istiyorum-artık-yeteneklerimi-değerlendirmek-istiyorum', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'LoginShow'])->name('login.show');
Route::get('/register',[AuthController::class,'RegisterShow'])->name('register.show');
Route::post('/login',[AuthController::class,'Login'])->name('login');
Route::post('/register',[AuthController::class,'Register'])->name('register');
Route::get('/logout',[AuthController::class,'Logout'])->name('logout');


Route::group(["middleware" => ['auth']], function () {

    Route::get('/',[HomeController::class,'Home'])->name('home');
    Route::get('/about',[HomeController::class,'About'])->name('about');
    Route::get('/contact',[HomeController::class,'Contact'])->name('contact');
    Route::post('/contact',[HomeController::class,'ContactCreate'])->name('contact.create');
    Route::get('/profile/{user}',[HomeController::class,'Profile'])->name('profile'); // yes sec


    Route::get('/cource',[CourceController::class,'Cource'])->name('cource.d'); // yes sec
    Route::get('/cource-detail/{cource}',[CourceController::class,'CourceDetail'])->name('cource.detail'); // yes sec


    Route::get('/cart/{user}',[CartController::class,'Cart'])->name('cart'); // yes sec
    Route::get('/cart-create/{cource}',[CartController::class,'CartCreate'])->name('cart.create'); // yes sec
    Route::get('/cart-delete/{card}',[CartController::class,'CartDelete'])->name('cart.delete'); // yes sec


    Route::post('/enrollment-create/{cource}',[EnrollmentsController::class,'EnrollmentCreate'])->name('enrollment.create'); // yes sec

    Route::get('/stu-lesson-detail/{lesson}',[LessonController::class,'StuLessonDetail'])->name('stu.lesson.detail'); // yes sec

    Route::get('/cource-exam/{cource}',[QuizController::class,'Exam'])->name('exam.start'); // yes sec
    Route::post('/cource-exam/{exam}',[QuizController::class,'ExamResult'])->name('exam.result'); // yes sec


    Route::get('/user-summary/{user}',[HomeController::class,'UserSummary'])->name('user.summary'); // yes sec

    Route::get('/certifica/{user}',[CertificaController::class,'Certifica'])->name('certifica');

    Route::group(["middleware" => [TeacherMiddleware::class]], function () {

        Route::get('/cource-create',[CourceController::class,'CourceShow'])->name('cource.show') ; // yes
        Route::post('/cource-create',[CourceController::class,'CourceCreate'])->name('course.create') ; // yes
        Route::get('/cource-update/{cource}',[CourceController::class,'CourceEdit'])->name('cource.edit'); // yes sec
        Route::post('/cource-update/{cource}',[CourceController::class,'CourceUpdate'])->name('course.update'); // yes sec
        Route::get('/cource-delete/{cource}',[CourceController::class,'CourceDelete'])->name('cource.delete'); // yes sec
        Route::get('/tch-cource-list/{user}',[CourceController::class,'CourceList'])->name('cource.list'); // yes sec
        Route::post('/lesson-create/{cource}',[LessonController::class,'LessonCreate'])->name('lesson.create'); // yes sec
        Route::get('/lesson-update/{lesson}',[LessonController::class,'LessonEdit'])->name('lesson.edit'); // yes sec
        Route::post('/lesson-update/{lesson}',[LessonController::class,'LessonUpdate'])->name('lesson.update'); // yes sec
        Route::get('/lesson-delete/{lesson}',[LessonController::class,'LessonDelete'])->name('lesson.delete'); // yes sec
        Route::get('/question-create/{exam}',[ExamController::class,'QuestionShow'])->name('question.show'); // yes sec
        Route::post('/question-create/{exam}',[ExamController::class,'QuestionCreate'])->name('question.create'); // yes sec
        Route::post('/exam-create/{cource}',[ExamController::class,'ExamCreate'])->name('exam.create'); // yes sec
        Route::get('/question-choice-delete/{question}',[ExamController::class,'QuestionDelete'])->name('question.delete'); // yes sec
        Route::get('/question-choice-update/{question}',[ExamController::class,'QuestionEdit'])->name('question.edit'); // yes sec
        Route::post('/question-choice-update/{question}',[ExamController::class,'QuestionUpdate'])->name('question.update'); // yes sec
    });
    
    Route::group(["middleware" => [StudentMiddleware::class]], function () {
    
    
        Route::get('/stu-cource-list/{user}',[CourceController::class,'StuCourceList'])->name('stu.cource.list'); // yes sec
        Route::get('/stu-cource-detail/{cource}',[CourceController::class,'StuCourceDetail'])->name('stu.cource.detail'); // yes sec
    
    });
});