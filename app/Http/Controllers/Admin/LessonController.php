<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cource;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function lessonList(){
        $lessons = Lesson::all();
        return view('admin.pages.lesson.lessonlist',compact('lessons'));
    }

    public function lessonEdit(Lesson $lesson){
        $cources = Cource::all();
        return view('admin.pages.lesson.lessonupdate',compact('lesson','cources'));
    }

    public function lessonUpdate(Request $request, Lesson $lesson){
        $lesson->update($request->all());
        return redirect()->back();
    }

    public function lessonDelete(Lesson $lesson){
        $lesson->delete();
        return redirect()->back();
    }
}
