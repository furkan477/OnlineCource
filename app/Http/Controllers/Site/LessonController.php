<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Cource;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function LessonCreate(LessonRequest $request, Cource $cource)
    {
        if (Auth::check() && Auth::id() == $cource->user->id && Auth::user()->role == "tch" || Auth::user()->role == "adm") {
            Lesson::create([
                "title" => $request->title,
                "content" => $request->content,
                "cource_id" => $cource->id,
            ]);
            return back()->withSuccess("Kursa Ders Ekleme İşlemi Başarıyla Gerçekleştirilmiştir.");
        }
        return redirect('/');
    }

    public function StuLessonDetail(Lesson $lesson)
    {
        if (Auth::check() && Auth::user()->role == 'tch' || Auth::user()->role == 'stu' || Auth::user()->role == 'adm') {
            return view("site.pages.student.lesson", compact("lesson"));
        }
        return redirect("/");
    }

    public function LessonEdit(Lesson $lesson)
    {
        if (Auth::check() && Auth::id() == $lesson->cources->user->id && Auth::user()->role == "tch" || Auth::user()->role == "adm") {
            return view("site.pages.teacher.lessonupdate", compact("lesson"));
        }
        return redirect("/");
    }

    public function LessonUpdate(LessonRequest $request, Lesson $lesson)
    {
        if (Auth::check() && $lesson->cources->user->id == Auth::id() && Auth::user()->role == "tch" || Auth::user()->role == "adm") {
            $lesson->update($request->all());
            return back()->withSuccess("Ders Güncelleme İşlemi Başarılı Bir Şekilde Gerçekleşti");
        }
        return redirect("/");
    }

    public function LessonDelete(Lesson $lesson)
    {
        if (Auth::check() && Auth::id() == $lesson->cources->user->id && Auth::user()->role == "tch" || Auth:: user()->role == "adm" ) {
            $lesson->delete();
            return redirect()->route('cource.detail',$lesson->cources->id)->withSuccess("Başarılı");
        }
        return redirect("/");
    }
}
