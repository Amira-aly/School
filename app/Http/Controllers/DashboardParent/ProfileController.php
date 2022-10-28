<?php

namespace App\Http\Controllers\DashboardParent;

use App\Http\Controllers\Controller;
use App\Models\Parentt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $parent = Parentt::findorFail(auth()->user()->id);
        return view('DashboardParent.profiles.show', compact('parent'));
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
        $parent = Parentt::findorFail($id);
        if (!empty($request->password)) {
            $parent->name_father = $request->name_father;
            $parent->name_mother = $request->name_mother;
            $parent->address_father = $request->address_father;
            $parent->address_mother = $request->address_mother;
            $parent->password = Hash::make($request->password);
            $parent->save();
        }else {
            $parent->name_father = $request->name_father;
            $parent->name_mother = $request->name_mother;
            $parent->address_father = $request->address_father;
            $parent->address_mother = $request->address_mother;
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
