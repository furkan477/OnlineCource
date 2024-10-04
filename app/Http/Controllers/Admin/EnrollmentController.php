<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function enrollmentList(){
        $enrollments = Enrollment::all();
        return view('admin.pages.enrollment.enrollmentlist',compact('enrollments'));
    }

    public function enrollmentDelete(Enrollment $enrollment){
        $enrollment->delete();
        return redirect()->back();
    }
}
