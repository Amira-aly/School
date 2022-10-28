<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = User::findorFail(auth()->user()->id);
        return view('DashboardAdmin.profiles.show',compact('admin'));
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
        $admin = User::findorFail($id);
        if (!empty($request->password)) {
            $admin->name = $request->name;
            $admin->password = Hash::make($request->password);
            $admin->save();
        } else {
            $admin->name = $request->name;
            $admin->save();
        }
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
