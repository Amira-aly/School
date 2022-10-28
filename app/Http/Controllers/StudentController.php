<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreStudents;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Parentt;
use App\Models\Level;
use App\Models\Nationality;
use App\Models\section;
use App\Models\Gender;
use App\Models\Student;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('DashboardAdmin.students.index',compact('students'));
    }

    public function Get_classrooms($id){

        $list_classrooms = Classroom::where("level_id", $id)->pluck("name", "id");
        return $list_classrooms;

    }

    public function Get_Sections($id)
    {
        $list_sections = Section::where("classroom_id", $id)->pluck("name", "id");
        return $list_sections;
    }

    public function create()
    {
        $data['classrooms'] = Classroom::all();
        $data['parents'] = Parentt::all();
        $data['levels'] = Level::all();
        $data['genders'] = Gender::all();
        $data['nationals'] = Nationality::all();
        return view('DashboardAdmin.students.create',$data);
    }

    public function store(StoreStudents $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $students = new Student();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationality_id = $request->nationality_id;
            $students->date_birth = $request->date_birth;
            $students->level_id = $request->level_id;
            $students->classroom_id = $request->classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();
            //images
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Image();
                    $images->image_name =$name;
                    $images->imageable_id =$students->id;
                    $images->imageable_type ='App\Student';
                    $images->save();
                }
            }
            DB::commit(); // insert data
            toastr()->success(trans('messages.success'));
            $students = Student::all();
            return view('DashboardAdmin.students.index',compact('students'));
        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('DashboardAdmin.students.show',compact('student'));
    }

    public function edit($id)
    {
        $data['levels'] = Level::all();
        $data['parents'] = Parentt::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationality::all();
        $students =  Student::findOrFail($id);
        return view('DashboardAdmin.students.edit',$data,compact('students'));
    }

    public function update(Request $request, $id)
    {
        try {
            $fileds = $request->validate([
                'email' => 'email|required',
                'password' => 'required',
                'name' => 'required',
                'gender_id' => 'required',
                'nationality_id' => 'required',
                'date_birth' => 'required|date',
                'level_id' => 'required',
                'classroom_id' => 'required',
                'section_id' => 'required',
                'parent_id' => 'required',
                'academic_year' => 'required',
            ]);
            $Students = Student::findorfail($id);
            $Students->name = ['ar' => $request->name, 'en' => $request->name_en];
            $Students->email = $request->email;
            $Students->password = Hash::make($request->password);
            $Students->gender_id = $request->gender_id;
            $Students->nationality_id = $request->nationality_id;
            $Students->date_birth = $request->date_birth;
            $Students->level_id = $request->level_id;
            $Students->classroom_id = $request->classroom_id;
            $Students->section_id = $request->section_id;
            $Students->parent_id = $request->parent_id;
            $Students->academic_year = $request->academic_year;
            $Students->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $ss = Student::find($id);
        $ss->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('students.index');

    }

    public function Upload_attachment(Request $request)
    {
        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new image();
            $images->image_name=$name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = 'App\Student';
            $images->save();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('students.show',$request->student_id);
    }

    public function Download_attachment($studentsname, $image_name)
    {
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$image_name));
    }

    public function Graduated($id)
    {
        $student = Student::findOrFail($id);
        $student->Delete();

        toastr()->success(trans('messages.success'));
        $students = Student::all();
        return view('DashboardAdmin.students.index',compact('students'));
    }

    public function Delete_attachment(Request $request)
    {
         // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->image_name);
         // Delete in data
        image::where('id',$request->id)->where('image_name',$request->image_name)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('students.show',$request->student_id);
    }
}
