<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Cource;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function Home()
    {
        if (Auth::check()) {
            $cources = Cource::orderBy("created_at", "desc")->take(5)->get();
            return view("site.pages.home", compact("cources"));
        }
        return redirect("/login");
    }

    public function About()
    {
        if (Auth::check()) {
            return view("site.pages.about");
        }
        return redirect("/login");
    }

    public function Contact()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view("site.pages.contact", compact("user"));
        }
        return redirect("/login");
    }

    public function ContactCreate(ContactRequest $request)
    {
        if (Auth::check()) {
            Contact::create([
                "subject" => $request->subject,
                "message" => $request->message,
                "user_id" => Auth::id(),
            ]);
            return back()->withSuccess("Online Kurs için destek talebiniz gönderilmiştir");
        }
        return redirect("/login");
    }

    public function Profile(User $user)
    {
        if (Auth::check() && Auth::id() == $user->id) {
            return view("site.pages.profile", compact("user"));
        }
        return redirect("/login");
    }

    public function UserSummary(User $user){
        $cource = Cource::where('user_id', Auth::id())->pluck('id');
        $enrollment = Enrollment::whereIn('cource_id',$cource)->pluck('user_id');

        if(Auth::id() == $user->id || ( Auth::user()->role == 'tch' && $enrollment->contains($user->id)) ){
            return view('site.pages.usersummary',compact('user'));
        }
        return redirect('/');
    }
}
