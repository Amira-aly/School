@extends('layouts.master')
@section('css')
    @section('title')
       {{ trans('exam_trans.List_tested_students') }}
    @stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('exam_trans.List_tested_students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/teacher/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('exam_trans.List_tested_students') }}</li>
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('students_trans.name') }}</th>
                                            <th>{{ trans('exam_trans.question_name') }}</th>
                                            <th>{{ trans('exam_trans.score') }}</th>
                                            <th>{{ trans('exam_trans.tamper') }}</th>
                                            <th>{{ trans('exam_trans.Exam_date') }}</th>
                                            <th>{{ trans('exam_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($degrees as $degree)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$degree->student->name}}</td>
                                                <td>{{$degree->question_id}}</td>
                                                <td>{{$degree->score}}</td>
                                                @if($degree->abuse == 0)
                                                    <td style="color: green">{{ trans('exam_trans.No_manipulation') }}</td>
                                                @else
                                                    <td style="color: red">{{ trans('exam_trans.manipulation') }}</td>
                                                @endif
                                                <td>{{$degree->date}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#repeat_exam{{ $degree->exam_id }}" title="agen">
                                                        <i class="fas fa-repeat"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="repeat_exam{{$degree->exam_id}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('repeat.exam', $degree->exam_id)}}" method="POST">
                                                        {{method_field('POST')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">{{ trans('exam_trans.open_exam') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>{{$degree->student->name}}</h6>
                                                                <input type="hidden" name="student_id" value="{{$degree->student_id}}">
                                                                <input type="hidden" name="exam_id" value="{{$degree->exam_id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('exam_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-info">{{ trans('exam_trans.submit') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
