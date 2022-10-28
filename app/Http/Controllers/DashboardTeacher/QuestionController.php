<?php

namespace App\Http\Controllers\DashboardTeacher;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $question = new Question();
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->exam_id = $request->exam_id;
            $question->save();
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $exam_id = $id;
        return view('DashboardTeacher.questions.create', compact('exam_id'));
    }

    public function edit($id)
    {
        $question = Question::findorFail($id);
        return view('DashboardTeacher.questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        try {
            $question = Question::findorfail($id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Question::destroy($id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function student_exam($exam_id)
    {
        $degrees = Degree::where('exam_id', $exam_id)->get();
        return view('DashboardTeacher.exams.student_exam', compact('degrees'));
    }

    public function repeat_exam(Request $request)
    {
        Degree::where('student_id', $request->student_id)->where('exam_id', $request->exam_id)->delete();
        toastr()->success(trans('exam_trans.agen'));
        return redirect()->back();
    }
}
