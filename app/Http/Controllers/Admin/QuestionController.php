<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Choice;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function questionList(){
        $questions = Question::all();
        return view('admin.pages.questionchoice.questionchoicelist',compact('questions'));
    }

    public function questionEdit(Question $question){
        return view('admin.pages.questionchoice.questionchoiceupdate',compact('question'));
    }

    public function questionUpdate(Request $request,Question $question){
        $question->update([
            'question' => $request->question,
        ]);
        foreach($request->choice as $choice){
            $choices = Choice::findOrFail($choice['id']);
            if($choices){
                $choices->choice = $choice['text'];
                $choices->is_correct = $choice['is_correct'];
                $choices->save();
            }
        }
        return redirect()->back();
    }

    public function questionDelete(Question $question){
        foreach($question->choices as $choice){
            $choice->delete();
        }
        $question->delete();

        return redirect()->back();
    }
}
