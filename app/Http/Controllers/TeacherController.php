<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreTeachers;
use App\Models\Teacher;
use App\Models\Gender;
use App\Models\Specialization;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $specializations = Specialization::all();
        $genders = Gender::all();
        return view('DashboardAdmin.teachers.index',compact('teachers','specializations','genders'));
    }

    public function create()
    {
        $specializations = Specialization::all();
        $genders = Gender::all();
        return view('DashboardAdmin.teachers.create',compact('specializations','genders'));
    }

    public function store(Request $request)
    {
        try {
            $fileds = $request->validate([
                'email' => 'email|required|unique:teachers',
                'password' => 'required',
                'name' => 'required',
                'name_en' => 'required',
                'specialization_id' => 'required',
                'gender_id' => 'required',
                'joining_date' => 'required',
                'address' => 'required'
            ]);
            $teacher = new Teacher;
            $teacher->name = ['en' => $request->name_en, 'ar' => $request->name];
            $teacher->email = $request->email;
            $teacher->password = Hash::make($request->password);
            $teacher->gender_id = $request->gender_id;
            $teacher->specialization_id = $request->specialization_id;
            $teacher->joining_date = $request->joining_date;
            $teacher->address = $request->address;
            $teacher->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('teachers.index');

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
        $teacher = Teacher::find($id);
        $specializations = Specialization::all();
        $genders = Gender::all();
        return view('DashboardAdmin.teachers.edit', compact('teacher','specializations','genders'));
    }

    public function update(Request $request, $id)
    {
        try{
            $fileds = $request->validate([
                'email' => 'email|required',
                'password' => 'required',
                'name' => 'required',
                'name_en' => 'required',
                'specialization_id' => 'required',
                'gender_id' => 'required',
                'joining_date' => 'required',
                'address' => 'required'
            ]);
            $teacher = Teacher::find($id);
            $teacher->name = ['en' => $request->name_en, 'ar' => $request->name];
            $teacher->email = $request->email;
            $teacher->password = Hash::make($request->password);
            $teacher->gender_id = $request->gender_id;
            $teacher->specialization_id = $request->specialization_id;
            $teacher->joining_date = $request->joining_date;
            $teacher->address = $request->address;
            $teacher->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('teachers.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('teachers.index');
    }
}
