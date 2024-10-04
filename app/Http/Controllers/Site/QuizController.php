<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Certifica;
use App\Models\Choice;
use App\Models\Cource;
use App\Models\Enrollment;
use App\Models\Exam;
use App\Models\ExamResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function Exam(Cource $cource)
    {
        $enrollment = Enrollment::where('user_id',Auth::id())->where('cource_id',$cource->id)->get();
        $examresult = ExamResult::where('user_id',Auth::id())->where('exam_id',$cource->exams->id)->get();

        if(!empty($enrollment) && $enrollment->count() >= 1 && $examresult->count() < 1){
            $exam = Exam::where('cource_id',$cource->id)->with('questions.choices')->first();
            return view('site.pages.courceexam',compact('cource','exam'));
        }
        return redirect('/');
    }

    public function ExamResult(Request $request,Exam $exam){

        $enrollment = Enrollment::where('user_id',Auth::id())->where('cource_id',$exam->cources->id)->first();
        $examresult = ExamResult::where('user_id',Auth::id())->where('exam_id',$exam->id)->first();

        if(!empty($enrollment) && empty($examresult)){
            $score = 0;
            foreach($request->answers as $question_id => $choice_id){
    
                $control = Choice::where('question_id',$question_id)->where('id',$choice_id)->value('is_correct');
                
                if($control == 1){
                    $score += 10;
                }
            }
    
            $examresult = ExamResult::create([
                'user_id' => Auth::id(),
                'exam_id' => $exam->id,
                'score' => $score,
            ]);
            
            if($score <= 49){
                $certifica = '0';
            }elseif($score >= 50 && $score <= 75){
                $certifica = '1';
            }elseif($score > 74){
                $certifica = '2';
            }
    
            Certifica::create([
                'user_id' => Auth::id(),
                'cource_id' => $exam->cources->id,
                'certifica' => $certifica,
                'examresult_id' => $examresult->id,
            ]);
    
            return redirect()->route('stu.cource.list',Auth::id())->withSuccess('Sınavınız Başarılı Bir Şekilde Gerçekleştirilmiştir. | Sınav Sonucunu Kursunuzun Detay Sayfasından Görebilirsiniz');
        }
        return redirect('/');
    }
}
