<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Category;
use App\Models\Certifica;
use App\Models\Enrollment;
use App\Models\ExamResult;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $categories = Category::all();
        return view('admin.pages.category.categorylist',compact('categories'));
    }

    public function categoryEdit(Category $categoryy)
    {
        $categories = Category::where('cat_ust',0)->with('underCategory')->get();
        return view('admin.pages.category.categoryupdate',compact('categoryy','categories'));
    }

    public function categoryUpdate(Request $request , Category $categoryy)
    {
        $categoryy->update($request->all());
        return redirect()->back();
    }

    public function categoryShow(){
        $categories = Category::where('cat_ust',0)->with('underCategory')->get();
        return view('admin.pages.category.categorycreate',compact('categories'));
    }

    public function categoryCreate(Request $request){
        Category::create($request->all());
        return redirect()->back();
    }

    public function categoryDelete(Category $category)
    {
        foreach($category->cources as $cource){
            foreach($cource->lessons as $lesson){
                $lesson->delete();
            }
            foreach($cource->exams->questions as $question){
                foreach($question->choices as $choice){
                    $choice->delete();
                }
                $question->delete();
            }
            Card::where('cource_id',$cource->id)->delete();
            Certifica::where('cource_id',$cource->id)->delete();
            Enrollment::where('cource_id',$cource->id)->delete();
            ExamResult::where('exam_id',$cource->exams->id)->delete();
            $cource->exams->delete();
            $cource->delete();
        }
        $category->delete();

        return redirect()->back();
    }
}
