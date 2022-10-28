<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLevels;
use App\Models\Level;
use App\Models\Classroom;
class LevelController extends Controller
{

  public function index()
  {
    $levels = Level::all();
    return view('DashboardAdmin.levels.index',compact('levels'));
  }

  public function create()
  {
  }

  public function store(StoreLevels $request)
  {
    try {
    $validated = $request->validated();
    $level = new level;
    $level->name = ['en' => $request->name_en, 'ar' => $request->name];
    $level->notes = $request->notes;
    $level->save();
    toastr()->success(trans('messages.success'));
     return redirect()->route('levels.index');
    }
    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  public function show($id)
  {
  }

  public function edit($id)
  {
  }

  public function update(StoreLevels $request, $id)
  {
    try{
        $validated = $request->validated();
        $level = level::find($id);
        $level->name = ['en' => $request->name_en, 'ar' => $request->name];
        $level->notes = $request->notes;
        $level->save();
        toastr()->success(trans('messages.Update'));
        return redirect()->route('levels.index');
    }
    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  public function destroy(Request $request,$id)
  {
    $class_id = Classroom::where('level_id',$request->id)->pluck('level_id');
    if($class_id->count() == 0){
        $levels = Level::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('levels.index');
    }
    else{
        toastr()->error(trans('level_trans.delete_level_Error'));
        return redirect()->route('levels.index');

    }
  }

}

?>
