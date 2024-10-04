<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamRequest;
use App\Http\Requests\QuestChoiRequest;
use App\Models\Choice;
use App\Models\Cource;
use App\Models\Exam;
use App\Models\Question;
use Auth;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function QuestionShow(Exam $exam)
    {
        if($exam->cources->user->id == Auth::id()){
            return view('site.pages.teacher.questionadd', compact('exam'));
        }
        return redirect('/');
    }

    public function QuestionCreate(QuestChoiRequest $request, Exam $exam)
    {
        if($exam->cources->user->id == Auth::id()){
            $questions = $exam->questions()->create([
                "question" => $request->question
            ]);

            foreach ($request->choice as $choice) {
                $questions->choices()->create([
                    "choice" => $choice['text'],
                    "is_correct" => $choice['is_correct'],
                ]);
            }

            return back()->withSuccess('Soru Ekleme İşlemi Başarılı.');
        }
        return redirect('/');
    }

    public function QuestionEdit(Question $question)
    {
        if ($question->exams->cources->user->id == Auth::id()){
            return view('site.pages.teacher.questionUpdate', compact('question'));
        }
        return redirect('/');
    }

    public function QuestionUpdate(QuestChoiRequest $request, Question $question)
    {
        if ($question->exams->cources->user->id == Auth::id()){
            $question->question = $request->question;
            $question->save();

            foreach ($request->choice as $req) {
                $choice = Choice::findOrFail($req['id']);
                if ($choice) {
                    $choice->choice = $req['text'];
                    $choice->is_correct = $req['is_correct'];
                    $choice->save();
                }
            }
            return back()->withSuccess('Güncelleme İşlemi Başarılı Bir Şekilde Gerçekleşmiştir.');
        }
        return redirect('/');
    }

    public function QuestionDelete(Question $question)
    {
        if ($question->exams->cources->user->id == Auth::id()){
            $question->choices()->delete();
            $question->delete();

            return back();
        }
        return redirect('/');
    }

    public function ExamCreate(ExamRequest $request, Cource $cource)
    {
        if($cource->user->id == Auth::id()){
            Exam::create([
                'title' => $request->name,
                'description' => $request->description,
                'cource_id' => $cource->id,
            ]);

            return back()->withSuccess('Sınav Oluştuma İşleminiz Başlamıştır.');
        }
        return redirect('/');
    }

}
