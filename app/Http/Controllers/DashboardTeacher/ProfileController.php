<?php
namespace App\Http\Controllers\DashboardTeacher;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function index()
    {
        $teacher = Teacher::findorFail(auth()->user()->id);
        return view('DashboardTeacher.profiles.show',compact('teacher'));
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
        $teacher = Teacher::findorFail($id);
        if (!empty($request->password)) {
            $teacher->name = $request->name;
            $teacher->address = $request->address;
            $teacher->password = Hash::make($request->password);
            $teacher->save();
        }else {
            $teacher->name = $request->name;
            $teacher->address = $request->address;
            $teacher->save();
        }
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
