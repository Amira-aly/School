@extends('layouts.teacher.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_trans.list_question') }}
@stop
@endsection
@section('page-header')
 <!-- breadcrumb -->
 <div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.list_question') }} {{$exam->name}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/teacher/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.list_question') }}</li>
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
                                <a href="{{route('questionss.show',$exam->id)}}" class="btn btn-success btn-lg" role="button" aria-pressed="true">{{ trans('exam_trans.add_questions') }}</a><br><br>
                                <a href="{{route('student.exam',$exam->id)}}" class="btn btn-success btn-lg" title="View the tested students" role="button" aria-pressed="true"><i class="fa fa-street-view"></i></a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ trans('exam_trans.question_name') }}</th>
                                            <th scope="col">{{ trans('exam_trans.answers') }}</th>
                                            <th scope="col">{{ trans('exam_trans.correct_answer') }}</th>
                                            <th scope="col">{{ trans('exam_trans.score') }}</th>
                                            <th scope="col">{{ trans('exam_trans.exam_name') }}</th>
                                            <th scope="col">{{ trans('exam_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($questions as $question)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$question->title}}</td>
                                                <td>{{$question->answers}}</td>
                                                <td>{{$question->right_answer}}</td>
                                                <td>{{$question->score}}</td>
                                                <td>{{$question->exam->name}}</td>
                                                <td>
                                                    <a href="{{route('questionss.edit',$question->id)}}" title="Edit"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_exam{{ $question->id }}" title="Delete"><i
                                                            class="fa fa-trash"></i></button>

                                                    </a>
                                                </td>
                                            </tr>

                                        @include('DashboardTeacher.questions.delete')
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
