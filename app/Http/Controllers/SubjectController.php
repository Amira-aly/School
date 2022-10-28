<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreSbject;
use App\Models\level;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::get();
        return view('DashboardAdmin.subjects.index',compact('subjects'));
    }

    public function create()
    {
        $levels = level::get();
        $teachers = Teacher::get();
        return view('DashboardAdmin.subjects.create',compact('levels','teachers'));
    }

    public function store(StoreSbject $request)
    {
        try {
            $validated = $request->validated();
            $subject = new Subject();
            $subject->name = ['en' => $request->name_en, 'ar' => $request->name];
            $subject->level_id = $request->level_id;
            $subject->classroom_id = $request->classroom_id;
            $subject->teacher_id = $request->teacher_id;
            $subject->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('subjects.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $subject =Subject::findorfail($id);
        $levels = Level::get();
        $teachers = Teacher::get();
        return view('DashboardAdmin.subjects.edit',compact('subject','levels','teachers'));
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            $subjects =  Subject::findorfail($request->id);
            $subjects->name = ['en' => $request->name_en, 'ar' => $request->name];
            $subjects->level_id = $request->level_id;
            $subjects->classroom_id = $request->classroom_id;
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('subjects.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            Subject::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
