@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Student_Departmentb')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.Student_Departmentb') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Student_Departmentb') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                    {{trans('students_trans.Undo_all')}}
                                </button>
                                <br><br>


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('students_trans.name')}}</th>
                                            <th class="alert-danger">{{trans('students_trans.level_old')}}</th>
                                            <th class="alert-danger">{{ trans('students_trans.previous_class') }}</th>
                                            <th class="alert-danger">{{ trans('students_trans.section_old') }}</th>
                                            <th class="alert-danger">{{ trans('students_trans.academic_year_old') }}</th>
                                            <th class="alert-success">{{ trans('students_trans.level_new') }}</th>
                                            <th class="alert-success">{{ trans('students_trans.previous_class_new') }}</th>
                                            <th class="alert-success">{{ trans('students_trans.section_new') }}</th>
                                            <th class="alert-success">{{ trans('students_trans.academic_year_new') }}</th>
                                            <th>{{trans('students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->p_student->name}}</td>
                                                <td>{{$promotion->f_level->name}}</td>
                                                <td>{{$promotion->f_classroom->name}}</td>
                                                <td>{{$promotion->f_section->name}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->t_level->name}}</td>
                                                <td>{{$promotion->t_classroom->name}}</td>
                                                <td>{{$promotion->t_section->name}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                <td>
                                                    <button type="button" style="margin-bottom: 5px;" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}">{{ trans('students_trans.Undo_student') }}</button>
                                                    <a type="button" href="{{route('promotion.graduated',$promotion->student_id)}}" class="btn btn-sm btn-outline-success" > {{ trans('students_trans.gradustion') }}</a>
                                                </td>
                                            </tr>
                                            @include('DashboardAdmin.students.promotion.delete_all')
                                            @include('DashboardAdmin.students.promotion.delete_one')
                                        @endforeach
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
