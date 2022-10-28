<?php
namespace App\Http\Controllers;
use App\Models\level;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('DashboardAdmin.students.promotion.management',compact('promotions'));
    }

    public function create()
    {
        $levels = level::all();
        return view('DashboardAdmin.students.promotion.create',compact('levels'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $students = Student::where('level_id',$request->level_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->get();
            if($students->count() < 1){
                return redirect()->back()->with('error_promotions', __(trans('students_trans.error_promotions')));
            }
            foreach ($students as $student){
                $ids = explode(',',$student->id);
                Student::whereIn('id', $ids)
                    ->update([
                        'level_id'=>$request->level_id_new,
                        'classroom_id'=>$request->classroom_id_new,
                        'section_id'=>$request->section_id_new,
                        'academic_year'=>$request->academic_year_new,
                    ]);
                Promotion::updateOrCreate([
                    'student_id'=>$student->id,
                    'from_level'=>$request->level_id,
                    'from_classroom'=>$request->classroom_id,
                    'from_section'=>$request->section_id,
                    'to_level'=>$request->level_id_new,
                    'to_classroom'=>$request->classroom_id_new,
                    'to_section'=>$request->section_id_new,
                    'academic_year'=>$request->academic_year,
                    'academic_year_new'=>$request->academic_year_new,
                ]);

            }
            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Graduated($id)
    {
        $student = Promotion::where("student_id","=",$id);
        $student->Delete();
        toastr()->success(trans('messages.success'));
        $promotions = Promotion::all();
        return view('DashboardAdmin.students.promotion.management',compact('promotions'));
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

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            if($request->page_id ==1){
             $Promotions = Promotion::all();
            foreach ($Promotions as $Promotion){
                $ids = explode(',',$Promotion->student_id);
                Student::whereIn('id', $ids)
                ->update([
                    'level_id'=>$Promotion->from_level,
                    'classroom_id'=>$Promotion->from_classroom,
                    'section_id'=> $Promotion->from_section,
                    'academic_year'=>$Promotion->academic_year,
                ]);
                Promotion::truncate();
            }
                DB::commit();
                toastr()->error(trans('messages.Delete'));
                return redirect()->back();
            }
            else{

                $Promotion = Promotion::findorfail($request->id);
                Student::where('id', $Promotion->student_id)
                    ->update([
                        'level_id'=>$Promotion->from_level,
                        'classroom_id'=>$Promotion->from_classroom,
                        'section_id'=> $Promotion->from_section,
                        'academic_year'=>$Promotion->academic_year,
                    ]);
                Promotion::destroy($request->id);
                DB::commit();
                toastr()->error(trans('messages.Delete'));
                return redirect()->back();
            }
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
