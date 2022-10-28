<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreExam;
use App\Models\Exam;
use App\Models\level;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::get();
        return view('DashboardAdmin.exams.index', compact('exams'));
    }

    public function create()
    {
        $data['levels'] = level::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('DashboardAdmin.exams.create', $data);
    }

    public function store(StoreExam $request)
    {
        try {
            $validated = $request->validated();
            $exams = new Exam();
            $exams->name = ['en' => $request->name_en, 'ar' => $request->name];
            $exams->subject_id = $request->subject_id;
            $exams->level_id = $request->level_id;
            $exams->classroom_id = $request->classroom_id;
            $exams->section_id = $request->section_id;
            $exams->teacher_id = $request->teacher_id;
            $exams->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('exams.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $exam = Exam::findorFail($id);
        $data['levels'] = level::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('DashboardAdmin.exams.edit', $data, compact('exam'));
    }

    public function update(Request $request, $id)
    {
        try {
            $exams = Exam::findorFail($request->id);
            $exams->name = ['en' => $request->name_en, 'ar' => $request->name];
            $exams->subject_id = $request->subject_id;
            $exams->level_id = $request->level_id;
            $exams->classroom_id = $request->classroom_id;
            $exams->section_id = $request->section_id;
            $exams->teacher_id = $request->teacher_id;
            $exams->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('exams.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            Exam::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
