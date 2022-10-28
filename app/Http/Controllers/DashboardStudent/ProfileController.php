<?php

namespace App\Http\Controllers\DashboardStudent;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $student = Student::findorFail(auth()->user()->id);
        return view('DashboardStudent.profiles.show', compact('student'));
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
        $parent = Student::findorFail($id);
        if (!empty($request->password)) {
            $parent->name = $request->name;
            $parent->password = Hash::make($request->password);
            $parent->save();
        }else {
            $parent->name = $request->name;
            $parent->save();
        }
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
