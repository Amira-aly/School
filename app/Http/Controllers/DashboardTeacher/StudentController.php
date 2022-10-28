<?php

namespace App\Http\Controllers\DashboardTeacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudents;
use App\Models\Attendance;
use App\Models\Section;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function student()
    {
        $ids = DB::table('teacher_sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('DashboardTeacher.students.index', compact('students'));
    }

    public function section()
    {
        $ids = DB::table('teacher_sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $sections = Section::whereIn('id', $ids)->get();
        return view('DashboardTeacher.sections.index', compact('sections'));
    }

    public function attendance(Request $request)
    {
        try {
            $attenddate = date('Y-m-d');
            foreach ($request->attendences as $studentid => $attendence) {
                if ($attendence == 'presence') {
                    $attendence_status = true;
                } else if ($attendence == 'absent') {
                    $attendence_status = false;
                }
                Attendance::updateorCreate(
                    [
                        'student_id' => $studentid,
                        'attendence_date' => $attenddate
                    ],
                    [
                    'student_id' => $studentid,
                    'level_id' => $request->level_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => auth()->user()->id,
                    'attendence_date' => $attenddate,
                    'attendence_status' => $attendence_status
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function editAttendance(Request $request)
    {
        try {
            $date = date('Y-m-d');
            $student_id = Attendance::where('attendence_date', $date)->where('student_id', $request->id)->first();
            if ($request->attendences == 'presence') {
                $attendence_status = true;
            } else if ($request->attendences == 'absent') {
                $attendence_status = false;
            }
            $student_id->update([
            'attendence_status' => $attendence_status
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function attendanceReport()
    {
        $ids = DB::table('teacher_sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('DashboardTeacher.students.attendance_report', compact('students'));
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
            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
            return view('DashboardTeacher.students.attendance_report', compact('Students', 'students'));
        } else {
            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)->get();
            return view('DashboardTeacher.students.attendance_report', compact('Students', 'students'));
        }
    }
}
