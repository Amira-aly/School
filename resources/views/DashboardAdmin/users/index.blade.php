@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_trans.all_users') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.all_users') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.all_users') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div  style="height: 400px;" class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="tab nav-border" style="position: relative;">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block w-100">
                                <h5 style="font-family: 'Cairo', sans-serif" class="card-title">{{ trans('main_trans.all_users') }}</h5>
                            </div>
                            <div class="d-block d-md-flex nav-tabs-custom">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item active show">
                                        <a class="nav-link" id="admin-tab" data-toggle="tab" href="#admin"
                                           role="tab" aria-controls="admin" aria-selected="false">{{ trans('main_trans.admin') }}
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link " id="students-tab" data-toggle="tab"
                                           href="#students" role="tab" aria-controls="students"
                                           aria-selected="true">{{ trans('main_trans.student') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                           role="tab" aria-controls="teachers" aria-selected="false">{{ trans('main_trans.Teachers') }}
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                           role="tab" aria-controls="parents" aria-selected="false">{{ trans('main_trans.Parents') }}
                                        </a>
                                    </li>



                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            {{--admin Table--}}
                            <div class="tab-pane fade active show" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>{{ trans('profile_trans.user_name') }}</th>
                                            <th>{{ trans('profile_trans.email') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}}</td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{--students Table--}}
                            <div class="tab-pane fade " id="students" role="tabpanel" aria-labelledby="students-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>{{ trans('students_trans.name') }}</th>
                                            <th>{{ trans('students_trans.email') }}</th>
                                            <th>{{ trans('students_trans.gender') }}</th>
                                            <th>{{ trans('students_trans.Grade') }}</th>
                                            <th>{{ trans('students_trans.classrooms') }}</th>
                                            <th>{{ trans('students_trans.section') }}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->gender->name}}</td>
                                                <td>{{$student->level->name}}</td>
                                                <td>{{$student->classroom->name}}</td>
                                                <td>{{$student->section->name}}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{--teachers Table--}}
                            <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>{{ trans('teacher_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('teacher_trans.Gender') }}</th>
                                            <th>{{ trans('teacher_trans.Joining_Date') }}</th>
                                            <th>{{ trans('teacher_trans.specialization') }}</th>

                                        </tr>
                                        </thead>

                                        @foreach ($teachers as $teacher)
                                            <tbody>
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$teacher->name}}</td>
                                                <td>{{$teacher->gender->name}}</td>
                                                <td>{{$teacher->joining_date}}</td>
                                                <td>{{$teacher->specialization->name}}</td>

                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>

                            {{--parents Table--}}
                            <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>{{ trans('parent_trans.name_father') }}</th>
                                            <th>{{ trans('parent_trans.Email') }}</th>
                                            <th>{{ trans('parent_trans.National_ID_Father') }}</th>
                                            <th>{{ trans('parent_trans.Phone_Father') }}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($parents as $parent)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$parent->name_father}}</td>
                                                <td>{{$parent->email}}</td>
                                                <td>{{$parent->nationality_father_id}}</td>
                                                <td>{{$parent->phone_father}}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
