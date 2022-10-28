<?php

namespace App\Http\Controllers\DashboardParent;

use App\Models\Degree;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Degree as ModelsDegree;
use App\Models\Fee_invoice;
use App\Models\Receipt_Student;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChildrenController extends Controller
{
    public function index()
    {
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('DashboardParent.childrens.index', compact('students'));
    }

    public function results($id)
    {
        $student = Student::findorFail($id);
        if ($student->parent_id !== auth()->user()->id) {
            toastr()->error(trans('main_trans.eror'));
            return redirect()->route('sonss.index');
        }
        $degrees = Degree::where('student_id', $id)->get();
        if ($degrees->isEmpty()) {
            toastr()->error(trans('main_trans.results'));
            return redirect()->route('sonss.index');
        }
        return view('DashboardParent.degrees.index', compact('degrees'));
    }

    public function attendances()
    {
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('DashboardParent.Attendances.index', compact('students'));
    }

    public function attendanceSearch(Request $request)
    {
        $validated = $request->validate([
            'from'  => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ], [
            'to.after_or_equal' => trans('validation.after_or_equal'),
            'from.date_format' => trans('validation.date_format'),
            'to.date_format' => trans('validation.date_format'),
        ]);
        $ids = DB::table('teacher_sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        if ($request->student_id == 0) {
            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to]);
            return view('DashboardParent.Attendances.index', compact('Students', 'students'));
        } else {
            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)->get();
            return view('DashboardParent.Attendances.index', compact('Students', 'students'));
        }
    }

    public function fees(){
        $students_ids = Student::where('parent_id', auth()->user()->id)->pluck('id');
        $Fee_invoices = Fee_invoice::whereIn('student_id',$students_ids)->get();
        return view('DashboardParent.fees.index', compact('Fee_invoices'));
    }

    public function receiptStudent($id){
        $student = Student::findorFail($id);
        if ($student->parent_id !== auth()->user()->id) {
            toastr()->error(trans('main_trans.eror'));
            return redirect()->route('sons.fees');
        }
        $receipt_students = Receipt_Student::where('student_id',$id)->get();
        if ($receipt_students->isEmpty()) {
            toastr()->error(trans('main_trans.pay'));
            return redirect()->route('sons.fees');
        }
        return view('DashboardParent.receipts.index', compact('receipt_students'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
