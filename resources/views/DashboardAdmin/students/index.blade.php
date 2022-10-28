@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.students')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.students') }}</li>
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
                                <a href="{{route('students.create')}}" class="btn btn-success btn-lg" role="button"
                                   aria-pressed="true">{{trans('main_trans.Add_student')}}</a><br><br>
                                <div class="table">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('students_trans.name')}}</th>
                                            <th>{{trans('students_trans.email')}}</th>
                                            <th>{{trans('students_trans.gender')}}</th>
                                            <th>{{trans('students_trans.Grade')}}</th>
                                            <th>{{trans('students_trans.classrooms')}}</th>
                                            <th>{{trans('students_trans.section')}}</th>
                                            <th>{{trans('students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->gender->name}}</td>
                                            <td>{{$student->level->name}}</td>
                                            <td>{{$student->classroom->name}}</td>
                                            <td>{{$student->section->name}}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{trans('students_trans.Processes')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route('students.show',$student->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  {{ trans('students_trans.show_student') }}</a>
                                                            <a class="dropdown-item" href="{{route('students.edit',$student->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  {{ trans('students_trans.Student_Edit') }}</a>
                                                            <a class="dropdown-item" href="{{route('fees_student.show',$student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp; {{ trans('fee_trans.add_fee') }}&nbsp;</a>
                                                            <a class="dropdown-item" href="{{route('receipt_students.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; {{ trans('fee_trans.add_receipt') }}</a>
                                                            <a class="dropdown-item" href="{{route('processing_fee.show',$student->id)}}"><i style="color: #61e07b" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; {{ trans('fee_trans.add_exclude') }}</a>
                                                            <a class="dropdown-item" href="{{route('payment_students.show',$student->id)}}"><i style="color:goldenrod" class="fas fa-donate"></i>&nbsp; &nbsp; {{ trans('fee_trans.add_exchange') }}</a>
                                                            <a class="dropdown-item" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="##Delete_Student{{ $student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  {{ trans('students_trans.Deleted_Student') }}</a>
                                                            <a class="dropdown-item" href="{{route('students.graduated',$student->id)}}"> <i style="color:green" class="fas fa-glasses"></i>&nbsp;{{ trans('students_trans.gradustion') }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @include('DashboardAdmin.students.Delete')
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
