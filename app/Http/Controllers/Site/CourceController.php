<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Certifica;
use App\Models\Cource;
use App\Models\Enrollment;
use App\Models\ExamResult;
use App\Models\Lesson;
use App\Models\User;
use App\Notifications\NewCourceNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourceController extends Controller
{
    public function Cource(Request $request)
    {

        if (Auth::check()) {

            $start = $request->start_price ?? Cource::min("price");
            $end = $request->end_price ?? Cource::max("price");
            $cat = $request->category_id;

            if (($start || $end) || $cat) {
                if ($cat) {
                    $cources = Cource::where('category_id', $cat)->where('price', '>=', $start)->where('price', '<=', $end)->where('status','0')->get();
                } else {
                    $cources = Cource::where('price', '>=', $start)->where('price', '<=', $end)->where('status','0')->get();
                }
            } else {
                $cources = Cource::all();
            }
            $categories = Category::where('cat_ust', 0)->with('underCategory')->get();
            $minprice = $cources->min("price");
            $maxprice = $cources->max("price");
            return view("site.pages.cource", compact("cources", "minprice", "maxprice", "categories"));
        }
        return redirect("/login");

    }

    public function CourceShow()
    {

        if (Auth::check() && Auth::user()->role == "tch" || Auth::user()->role == "adm") {
            $categories = Category::where('cat_ust', 0)->with('underCategory')->get();
            return view("site.pages.teacher.courceadd", compact("categories"));
        }
        return redirect("/");
    }

    public function CourceCreate(CourseRequest $request)
    {

        if (Auth::check() && Auth::user()->role == "tch" || Auth::user()->role == "adm") {
            $cource = Cource::create([
                "title" => $request->title,
                "description" => $request->description,
                "price" => $request->price,
                "status" => $request->status,
                "category_id" => $request->category_id,
                "user_id" => Auth::id(),
            ]);

            $cource->user->notify(new NewCourceNotification($cource->id));

            return back()->withSuccess("Kurs Ekleme İşleminiz Başarılı Bir Şekilde Gerçekleştirilmiştir.");
        }
        return redirect("/");
    }

    public function CourceList(User $user)
    {
        if (Auth::check() && Auth::id() == $user->id && Auth::user()->role == "tch" || Auth::user()->role == "adm") {
            return view("site.pages.teacher.courcelist", compact("user"));
        }
        return redirect("/");
    }

    public function CourceDetail(Cource $cource)
    {
        if (Auth::check() &&  $cource->user->id == Auth::id() || !$cource->status == '1' || !$cource->status == '2') {
            return view("site.pages.courcedetail", compact("cource"));
        }
        return redirect("/");
    }

    public function StuCourceList(User $user)
    {
        if (Auth::check() && Auth::id() == $user->id && Auth::user()->role == "stu" || Auth::user()->role == "adm") {
            return view("site.pages.student.courcelist", compact("user"));
        }
        return redirect("/");
    }

    public function StuCourceDetail(Cource $cource)
    {
        $enrollment = Enrollment::where('user_id',Auth::id())->where('cource_id',$cource->id)->get();

        if (Auth::check() && !empty($enrollment) && Auth::user()->role == "stu" || Auth::user()->role == "adm") {
            $examcontrol = ExamResult::where('user_id',Auth::id())->where('exam_id',$cource->exams->id)->first();
            $certifica = Certifica::where('user_id',Auth::id())->where('cource_id',$cource->id)->first();
            return view("site.pages.student.courcelesson", compact("cource","examcontrol","certifica"));
        }
        return redirect("/");
    }

    public function CourceEdit(Cource $cource)
    {
        if (Auth::check() && $cource->exams && $cource->user->id == Auth::id() && Auth::user()->role == "tch" || Auth::user()->role == "adm") {

            $status = true;
            foreach ($cource->exams as $exam) {
                if($cource->exams->questions->count() > 10 || $cource->exams->questions->count() < 10) {
                    $status = false;
                    break;
                }
            }

            if($cource->exams->count() < 1 && count($cource->lessons) < 5){
                $status = false;
            }

            $categories = Category::where('cat_ust', 0)->with('underCategory')->get();
            return view("site.pages.teacher.courceupdate", compact("cource", "status" , "categories"));
        }
        return redirect("/");
    }

    public function CourceUpdate(CourseRequest $request, Cource $cource)
    {
        if ($cource->exams->questions->count() == 10 && Auth::check() && Auth::id() == $cource->user->id && Auth::user()->role == "tch" || Auth::user()->role == "adm") {
            $cource->update($request->all());
            return back()->withSuccess($cource->title . " Kursunun Güncelleme İşlemi Başarılı Bir Şekilde Gerçekleşmiştir");
        }
        return redirect("/");
    }

    public function CourceDelete(Cource $cource)
    {
        if (!$cource->status == '0' && $cource->enrollments < 1 && Auth::check() && Auth::id() == $cource->user->id && Auth::user()->role == "tch" || Auth::user()->role == "adm") {
            Lesson::where("cource_id", $cource->id)->delete();
            $cource->delete();
            return redirect()->route('cource.list',$cource->user->id)->withSuccess("Başarılı");
        }
        return redirect("/");
    }
}