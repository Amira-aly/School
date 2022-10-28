<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestion;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::get();
        return view('DashboardAdmin.questions.index', compact('questions'));
    }

    public function create()
    {
        $exams = Exam::get();
        return view('DashboardAdmin.questions.create',compact('exams'));
    }

    public function store(StoreQuestion $request)
    {
        try {
            $validated = $request->validated();
            $question = new Question();
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->exam_id = $request->exam_id;
            $question->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('questions.create');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $question = Question::findorfail($id);
        $exams = Exam::get();
        return view('DashboardAdmin.questions.edit',compact('question','exams'));
    }

    public function update(Request $request, $id)
    {
        try {
            $question = Question::findorfail($request->id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->exam_id = $request->exam_id;
            $question->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            Question::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
