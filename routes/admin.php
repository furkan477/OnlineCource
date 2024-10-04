<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificaController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CourceController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => [AdminMiddleware::class], 'prefix' => 'admin', 'as' => 'admin.'] , function () {

    Route::get('/hello',[AdminController::class,'index'])->name(name: 'admin');


    Route::get('user-list', [UserController::class,'userList'])->name('user.list');
    Route::get('user-delete/{user}', [UserController::class,'userDelete'])->name('user.delete');
    Route::get('user-about/{user}',[UserController::class,'userAbout'])->name('user.about');
    Route::get('user-update/{user}',[UserController::class,'userEdit'])->name('user.edit');
    Route::post('user-update/{user}',[UserController::class,'userUpdate'])->name('user.update');


    Route::get('category-list',[CategoryController::class,'categoryList'])->name('category.list');
    Route::get('category-update/{categoryy}',[CategoryController::class,'categoryEdit'])->name('category.edit');
    Route::post('category-update/{categoryy}',[CategoryController::class,'categoryUpdate'])->name('category.update');
    Route::get('category-delete/{category}',[CategoryController::class,'categoryDelete'])->name('category.delete');
    Route::get('category-create',[CategoryController::class,'categoryShow'])->name('category.show');
    Route::post('category-create',[CategoryController::class,'categoryCreate'])->name('category.create');


    Route::get('card-list',[CardController::class,'cardList'])->name('card.list');
    Route::get('card-delete/{card}',[CardController::class,'cardDelete'])->name('card.delete');


    Route::get('cource-list',[CourceController::class,'courceList'])->name('cource.list');
    Route::get('cource-about/{cource}',[CourceController::class,'courceAbout'])->name('cource.about');
    Route::get('cource-update/{cource}',[CourceController::class,'courceEdit'])->name('cource.edit');
    Route::post('cource-update/{cource}',[CourceController::class,'courceUpdate'])->name('cource.update');
    Route::get('cource-delete/{cource}',[CourceController::class,'courceDelete'])->name('cource.delete');


    Route::get('lesson-list',[LessonController::class,'lessonList'])->name('lesson.list');
    Route::get('lesson-update/{lesson}',[LessonController::class,'lessonEdit'])->name('lesson.edit');
    Route::post('lesson-update/{lesson}',[LessonController::class,'lessonUpdate'])->name('lesson.update');
    Route::get('lesson-delete/{lesson}',[LessonController::class,'lessonDelete'])->name('lesson.delete');


    Route::get('enrollment-list',[EnrollmentController::class,'enrollmentList'])->name('enrollment.list');
    Route::get('enrollment-delete/{enrollment}',[EnrollmentController::class,'enrollmentDelete'])->name('enrollment.delete');


    Route::get('exam-list',[ExamController::class,'examList'])->name('exam.list');
    Route::get('exam-about/{exam}',[ExamController::class,'examAbout'])->name('exam.about');
    Route::get('exam-update/{exam}',[ExamController::class,'examEdit'])->name('exam.edit');
    Route::post('exam-update/{exam}',[ExamController::class,'examUpdate'])->name('exam.update');
    Route::get('exam-delete/{exam}',[ExamController::class,'examDelete'])->name('exam.delete');


    Route::get('question&choice-list',[QuestionController::class,'questionList'])->name('question.list');
    Route::get('question&choice-update/{question}',[QuestionController::class,'questionEdit'])->name('question.edit');
    Route::post('question&choice-update/{question}',[QuestionController::class,'questionUpdate'])->name('question.update');
    Route::get('question&choice-delete/{question}',[QuestionController::class,'questionDelete'])->name('question.delete');


    Route::get('certifica-list',[CertificaController::class,'certificaList'])->name('certifica.list');
    Route::get('certifica-update/{certifica}',[CertificaController::class,'certificaEdit'])->name('certifica.edit');
    Route::post('certifica-update/{certifica}',[CertificaController::class,'certificaUpdate'])->name('certifica.update');
    Route::get('certifica-delete/{certifica}',[CertificaController::class,'certificaDelete'])->name('certifica.delete');


    Route::get('contact-list',[ContactController::class,'contactList'])->name('contact.list');
    Route::get('contact-delete/{contact}',[ContactController::class,'contactDelete'])->name('contact.delete');
});