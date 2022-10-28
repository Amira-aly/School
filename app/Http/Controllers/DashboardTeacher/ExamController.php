<?php

namespace App\Http\Controllers\DashboardTeacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExam;
use App\Models\Classroom;
use App\Models\Exam;
use App\Models\level;
use App\Models\Question;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::where('teacher_id',auth()->user()->id)->get();
        return view('DashboardTeacher.exams.index', compact('exams'));
    }

    public function create()
    {
        $data['levels'] = level::all();
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('DashboardTeacher.exams.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $exams = new Exam();
            $exams->name = ['en' => $request->name_en, 'ar' => $request->name];
            $exams->subject_id = $request->subject_id;
            $exams->level_id = $request->level_id;
            $exams->classroom_id = $request->classroom_id;
            $exams->section_id = $request->section_id;
            $exams->teacher_id = auth()->user()->id;
            $exams->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('exams.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $exam = Exam::findorFail($id);
        $data['levels'] = level::all();
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('DashboardTeacher.exams.edit', $data, compact('exam'));
    }

    public function show($id)
    {
        $questions = Question::where('exam_id',$id)->get();
        $exam = Exam::findorFail($id);
        return view('DashboardTeacher.questions.index',compact('questions','exam'));
    }

    public function update(Request $request, $id)
    {

        try {
            $exam = Exam::findorFail($request->id);
            $exam->name = ['en' => $request->name_en, 'ar' => $request->name];
            $exam->subject_id = $request->subject_id;
            $exam->level_id = $request->level_id;
            $exam->classroom_id = $request->classroom_id;
            $exam->section_id = $request->section_id;
            $exam->teacher_id = auth()->user()->id;
            $exam->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('exams.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Exam::destroy($id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Get_classrooms($id)
    {
        $list_classes = Classroom::where("level_id", $id)->pluck("name", "id");
        return $list_classes;
    }

    //Get Sections
    public function Get_Sections($id){

        $list_sections = Section::where("classroom_id", $id)->pluck("name", "id");
        return $list_sections;
    }
}
