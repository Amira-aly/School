@extends('layouts.teacher.master')
@section('css')
@section('title')
   {{ trans('attendance_trans.list_attendance') }}
@stop
@endsection
@section('page-header')
 <!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('attendance_trans.list_attendance') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/teacher/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('attendance_trans.list_attendance') }}</li>
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"  action="{{ route('attendance.search') }}" autocomplete="off" >
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{ trans('main_trans.search_information') }}</h6><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student">{{ trans('main_trans.student') }}</label>
                                <select class="custom-select mr-sm-2" name="student_id">
                                    <option value="0">{{ trans('main_trans.all') }}</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body datepicker-form">
                            <div class="input-group" data-date-format="yyyy-mm-dd">
                                <input type="text"  class="form-control range-from date-picker-default" placeholder="Start Date" required name="from">
                                <span class="input-group-addon">{{ trans('main_trans.To_date') }}</span>
                                <input class="form-control range-to date-picker-default" placeholder="End Date" type="text" required name="to">
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success nextBtn btn-lg pull-right " type="submit" style="margin-bottom: 20px;">{{trans('main_trans.search')}}</button>
                </form>
                @isset($Students)
                <div class="table-responsive ">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th class="alert-success">#</th>
                            <th class="alert-success">{{trans('students_trans.name')}}</th>
                            <th class="alert-success">{{trans('students_trans.Grade')}}</th>
                            <th class="alert-success">{{trans('students_trans.section')}}</th>
                            <th class="alert-success">{{ trans('main_trans.date') }}</th>
                            <th class="alert-warning">{{ trans('attendance_trans.Status') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Students as $student)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$student->student->name}}</td>
                                <td>{{$student->level->name}}</td>
                                <td>{{$student->section->name}}</td>
                                <td>{{$student->attendence_date}}</td>

                                @if($student->attendence_status == 0)
                                    <td class="btn-danger">
                                        {{ trans('attendance_trans.absence') }}
                                    </td>
                                @else
                                    <td class="btn-success">
                                        {{ trans('attendance_trans.presence') }}
                                    </td>
                                @endif

                            </tr>
                        @include('DashboardAdmin.students.delete')
                        @endforeach
                    </table>
                </div>
                @endisset

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@endsection
