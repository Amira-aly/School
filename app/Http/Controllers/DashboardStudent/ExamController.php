<?php

namespace App\Http\Controllers\DashboardStudent;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::where('level_id', auth()->user()->level_id)
            ->where('classroom_id', auth()->user()->classroom_id)
            ->where('section_id', auth()->user()->section_id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('DashboardStudent.exams.index', compact('exams'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($exam_id)
    {
        $student_id = Auth::user()->id;
        return view('DashboardStudent.exams.show',compact('exam_id','student_id'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
