@extends('layouts.teacher.master')
@section('css')
    @toastr_css
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('status'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ session('status') }}</li>
                </ul>
            </div>
        @endif

        <h5 style="font-family: 'Cairo', sans-serif;color: red">{{ trans('attendance_trans.date') }} : {{ date('Y-m-d') }}</h5>
        <form method="POST" action="{{ route('attendances.add') }}" autocomplete="off">

            @csrf
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                   style="text-align: center">
                <thead>
                <tr>
                    <th class="alert-success">#</th>
                    <th class="alert-success">{{ trans('students_trans.name') }}</th>
                    <th class="alert-success">{{ trans('students_trans.email') }}</th>
                    <th class="alert-success">{{ trans('students_trans.gender') }}</th>
                    <th class="alert-success">{{ trans('students_trans.Grade') }}</th>
                    <th class="alert-success">{{ trans('students_trans.classrooms') }}</th>
                    <th class="alert-success">{{ trans('students_trans.section') }}</th>
                    <th class="alert-success">{{ trans('attendance_trans.attendance') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->gender->name }}</td>
                        <td>{{ $student->level->name }}</td>
                        <td>{{ $student->classroom->name }}</td>
                        <td>{{ $student->section->name }}</td>
                        <td>
                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]"
                                       @foreach($student->attendances()->where('attendence_date',date('Y-m-d'))->get() as $attendance)
                                       {{ $attendance->attendence_status == 1 ? 'checked' : '' }}
                                       @endforeach
                                       class="leading-tight" type="radio"
                                       value="presence">
                                <span class="text-success">{{ trans('attendance_trans.presence') }}</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]"
                                       @foreach($student->attendances()->where('attendence_date',date('Y-m-d'))->get() as $attendance)
                                       {{ $attendance->attendence_status == 0 ? 'checked' : '' }}
                                       @endforeach
                                       class="leading-tight" type="radio"
                                       value="absent">
                                <span class="text-danger">{{ trans('attendance_trans.absence') }}</span>
                            </label>

                            <input type="hidden" name="level_id" value="{{ $student->level_id }}">
                            <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <P>
                <button class="btn btn-success btn-lg" type="submit">{{ trans('students_trans.submit') }}</button>
            </P>
        </form><br>
        <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
