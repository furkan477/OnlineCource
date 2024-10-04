<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Certifica;
use App\Models\Cource;
use App\Models\Enrollment;
use App\Models\ExamResult;
use Illuminate\Http\Request;

class CourceController extends Controller
{
    public function courceList(){
        $cources = Cource::all();
        return view('admin.pages.cource.courcelist',compact('cources'));
    }

    public function courceAbout(Cource $cource){
        return view('admin.pages.cource.courceabout',compact('cource'));
    }

    public function courceEdit(Cource $cource){
        $categories = Category::where('cat_ust',0)->with('underCategory')->get();
        return view('admin.pages.cource.courceupdate',compact('categories','cource'));
    }

    public function courceUpdate(Request $request, Cource $cource){
        $cource->update($request->all());
        return redirect()->back();
    }

    public function courceDelete(Cource $cource){
        foreach($cource->lessons as $lesson){
            $lesson->delete();
        }
        foreach($cource->exams->questions as $question){
            foreach($question->choices as $choice){
                $choice->delete();
            }
            $question->delete();
        }
        Certifica::where('cource_id',$cource->id)->delete();
        Enrollment::where('cource_id',$cource->id)->delete();
        ExamResult::where('exam_id',$cource->exams->id)->delete();
        $cource->exams->delete();
        $cource->delete();

        return redirect()->back();
    }
}
