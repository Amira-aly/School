<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use App\Models\Parentt;
use App\Models\Student;
use App\Models\Teacher;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data['admins'] = User::all();
        $data['teachers'] = Teacher::all();
        $data['students'] = Student::all();
        $data['parents'] = Parentt::all();
        return view('DashboardAdmin.users.index',$data);
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
