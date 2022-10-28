<?php
namespace App\Http\Controllers;
use App\Models\level;
use App\Models\Student;
use Illuminate\Http\Request;
class Student_LevelController extends Controller
{

    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('DashboardAdmin.students.graduated.index',compact('students'));
    }

    public function create()
    {
        $levels = level::all();
        return view('DashboardAdmin.students.graduated.create',compact('levels'));
    }

    public function store(Request $request)
    {
        $students = Student::where('level_id',$request->level_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated', __(trans('students_trans.error_promotions')));
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);
            Student::whereIn('id', $ids)->Delete();
        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('graduateds.index');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }
}
