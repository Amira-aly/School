<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClassrooms;
use App\Models\Level;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = classroom::all();
        $levels = level::all();
        return view('DashboardAdmin.classrooms.index',compact('classrooms','levels'));
    }

    public function create()
    {
    }

    public function store(StoreClassrooms $request)
    {
        try {
            $validated = $request->validated();
            $classroom = new classroom;
            $classroom->name = ['en' => $request->name_en, 'ar' => $request->name];
            $classroom->level_id = $request->level_id;
            $classroom->save();
            toastr()->success(trans('messages.success'));
             return redirect()->route('classrooms.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update(Request $request, $id)
    {
        try{
            $validated = $request->validated();
            $classroom = classroom::find($id);
            $classroom->name = ['en' => $request->name_en, 'ar' => $request->name];
            $classroom->level_id = $request->level_id;
            $classroom->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('classrooms.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $classroom= Classroom::find($id);
        $classroom->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('classrooms.index');
    }

    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);
        classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('classrooms.index');
    }

    public function filter(Request $request)
    {
        $levels = Level::all();
        $Search = classroom::select('*')->where('level_id','=',$request->level_id)->get();
        return view('DashboardAdmin.classrooms.index',compact('levels'))->withDetails($Search);

    }
}
