<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certifica;
use Illuminate\Http\Request;

class CertificaController extends Controller
{
    public function certificaList(){
        $certificas = Certifica::all();
        return view('admin.pages.certifica.certificalist',compact('certificas'));
    }

    public function certificaEdit(Certifica $certifica){
        return view('admin.pages.certifica.certificaupdate',compact('certifica'));
    }

    public function certificaUpdate(Request $request,Certifica $certifica){
        $certifica->certifica = $request->certifica;
        $certifica->save();
        $certifica->examresults->score = $request->score;
        $certifica->examresults->save();
        return redirect()->back();
    }

    public function certificaDelete(Certifica $certifica){
        $certifica->examresults->delete();
        $certifica->delete();
        return redirect()->back();
    }
}
