<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSection;
use App\Models\Level;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Teacher;
class SectionController extends Controller
{
    public function index()
    {
        $levels = Level::with(['sections'])->get();
        $classrooms = Classroom::all();
        $sections = Section::all();
        $teachers = Teacher::all();
        return view('DashboardAdmin.sections.index',compact('classrooms','levels','sections','teachers'));
    }

    public function create()
    {
        //
    }

    public function store(StoreSection $request)
    {
        try {
            $validated = $request->validated();
            $section = new section;
            $section->name = ['en' => $request->name_en, 'ar' => $request->name];
            $section->status = 1;
            $section->level_id = $request->level_id;
            $section->classroom_id =$request->classroom_id;
            $section->save();
            $section->teachers()->attach($request->teacher_id);
            toastr()->success(trans('messages.success'));
             return redirect()->route('sections.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(StoreSection $request, $id)
    {
        try {
            $validated = $request->validated();
            $section = Section::find($id);
            $section->name = ['en' => $request->name_en, 'ar' => $request->name];
            $section->level_id = $request->level_id;
            $section->classroom_id =$request->classroom_id;
            if(isset($request->status)) {
              $section->status = 1;
            } else {
              $section->status = 2;
            };
            if (isset($request->teacher_id)) {
                $section->teachers()->sync($request->teacher_id);
            } else {
                $section->teachers()->sync(array());
            }
            $section->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('sections.index');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        Section::find($id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('sections.index');
    }

    public function getclassroom($id)
    {
        $classroomss = Classroom::where("level_id", $id)->pluck("name", "id");
        return $classroomss;
    }
}
