<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certifica;
use App\Models\Cource;
use App\Models\Exam;
use App\Models\ExamResult;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function examList(){
        $exams = Exam::all();
        return view('admin.pages.exam.examlist',compact('exams'));
    }

    public function examAbout(Exam $exam){
        return view('admin.pages.exam.examabout',compact('exam'));
    }

    public function examEdit(Exam $exam){
        $cources = Cource::all();
        return view('admin.pages.exam.examupdate',compact('exam','cources'));
    }

    public function examUpdate(Request $request ,Exam $exam){
        $exam->update($request->all());
        return redirect()->back();
    }

    public function examDelete(Exam $exam){
        foreach($exam->questions as $question){
            foreach($question->choices as $choice){
                $choice->delete();
            }
            $question->delete();
        }
        foreach($exam->examresults as $examresult){
            $examresult->delete();
            Certifica::where('examresult_id',$examresult->id)->delete();
        }
        $exam->delete();
        return redirect()->back();
    }
}