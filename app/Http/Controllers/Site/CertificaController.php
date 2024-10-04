<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ExamResult;
use App\Models\User;
use Illuminate\Http\Request;

class CertificaController extends Controller
{
    public function Certifica(User $user){
        return view('site.pages.certifica',compact('user'));
    }
}
