<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Certifica;
use App\Models\Choice;
use App\Models\Contact;
use App\Models\Enrollment;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList(){
        $users = User::all();
        return view('admin.pages.user.userlist',compact('users'));
    }

    public function userAbout(User $user){
        return view('admin.pages.user.userabout',compact('user'));
    }

    public function userEdit(User $user){
        return view('admin.pages.user.userupdate',compact('user'));
    }
    public function userUpdate(Request $request,User $user){
        $user->update($request->all());
        return redirect()->back();
    }

    public function userDelete(User $user){
        if($user->role == 'stu'){
            Card::where('user_id',$user->id)->delete();
            Contact::where('user_id',$user->id)->delete();
            Enrollment::where('user_id',$user->id)->delete();
            ExamResult::where('user_id',$user->id)->delete();
            Certifica::where('user_id',$user->id)->delete();
            $user->delete();
        }elseif($user->role == 'tch' || $user->role == 'adm'){
            Card::where('user_id',$user->id)->delete();
            Contact::where('user_id',$user->id)->delete();
            Enrollment::where('user_id',$user->id)->delete();
            ExamResult::where('user_id',$user->id)->delete();
            Certifica::where('user_id',$user->id)->delete();
            foreach($user->cources as $cource){
                foreach($cource->lessons as $lesson){
                    $lesson->delete();
                }
                foreach($cource->exams->questions as $question){
                    foreach($question->choices as $choice){
                        $choice->delete();
                    }
                    $question->delete();
                }
                $cource->exams->delete();
                $cource->delete();
            }
            $user->delete();
        }

        return redirect()->back();
    }
}
