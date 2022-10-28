@extends('layouts.teacher.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_trans.list_exam') }}
@stop
@endsection
@section('page-header')
 <!-- breadcrumb -->
 <div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.list_exam') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/teacher/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.list_exam') }}</li>
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
                                <a href="{{route('exams.create')}}" class="btn btn-success btn-lg" role="button"
                                   aria-pressed="true">{{ trans('exam_trans.add_exam') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('exam_trans.exam_name') }}</th>
                                            <th>{{ trans('exam_trans.Name_Teacher') }}</th>
                                            <th>{{trans('exam_trans.level')}}</th>
                                            <th>{{trans('exam_trans.classroom')}}</th>
                                            <th>{{trans('exam_trans.sections')}}</th>
                                            <th>{{ trans('exam_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$exam->name}}</td>
                                                <td>{{$exam->teacher->name}}</td>
                                                <td>{{$exam->level->name}}</td>
                                                <td>{{$exam->classroom->name}}</td>
                                                <td>{{$exam->section->name}}</td>
                                                <td>
                                                    <a href="{{route('exams.edit',$exam->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_exam{{ $exam->id }}" title="Delete"><i
                                                            class="fa fa-trash"></i></button>
                                                    <a href="{{route('examss.show',$exam->id)}}"
                                                        class="btn btn-warning btn-sm" title="Show Question" role="button" aria-pressed="true"><i
                                                        class="fa fa-binoculars"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_exam{{$exam->id}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('exams.destroy',$exam->id)}}" method="POST">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">{{ trans('exam_trans.delete_exam') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('exam_trans.Warning_exam') }} {{$exam->name}}</p>
                                                                <input type="hidden" name="id" value="{{$exam->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('exam_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{ trans('exam_trans.Delete') }}</button>

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
@section('js')
    @toastr_js
    @toastr_render
@endsection