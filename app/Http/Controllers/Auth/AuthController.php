<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function LoginShow(){
        return view("auth.login");
    }
    public function RegisterShow(){
        return view("auth.register");
    }

    public function Register(RegisterRequest $request){
        User::create($request->all());
        return redirect("/login")->withSuccess("Kayıt Olma İşlemi Başarılı.");
    }

    public function Login(Request $request){
        $validate = $request->validate(["email"=> "required|email","password"=> "required" ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            if(Auth::user()->role == 'adm'){
                return redirect()->route(route: "admin.admin");
            }
            return redirect()->route(route: "home");
        }else{
            return back()->withError("E-Posta veya Şifre Hatalı Girilmiştir , lğtfen tekrar deneyiniz.");
        }
    }

    public function Logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/login")->withSuccess("Çıkış İşlemi Başarılı Bir Şekilde Gerçekleştirimiştir.");
    }
}
