@extends('layouts.teacher.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('exam_trans.edit_exam') }}
@stop
@endsection
@section('page-header')
 <!-- breadcrumb -->
 <div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('exam_trans.edit_exam') }} {{$exam->name}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/teacher/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('exam_trans.edit_exam') }}</li>
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

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('examss.update','test')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">

                                    <div class="col">
                                        <label >{{ trans('exam_trans.exam_name_ar') }}</label>
                                        <input type="text" name="name" value="{{$exam->getTranslation('name','ar')}}" class="form-control" required>
                                        <input type="hidden" name="id" value="{{$exam->id}}">
                                    </div>

                                    <div class="col">
                                        <label >{{ trans('exam_trans.exam_name_en') }}</label>
                                        <input type="text" name="name_en" value="{{$exam->getTranslation('name','en')}}" class="form-control" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="subject_id">{{ trans('exam_trans.subject_name') }} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="subject_id">
                                                @foreach($subjects as $subject)
                                                    <option value="{{ $subject->id }}" {{$subject->id == $exam->subject_id ? "selected":""}}>{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="level_id">{{trans('exam_trans.level')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="level_id" required>
                                                @foreach($levels as $level)
                                                    <option  value="{{ $level->id }}" {{$level->id == $exam->level_id ? "selected":""}}>{{ $level->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="classroom_id">{{trans('exam_trans.classroom')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="classroom_id" required>
                                                <option value="{{$exam->classroom_id}}">{{$exam->classroom->name}}</option>                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('exam_trans.sections')}} : </label>
                                            <select class="custom-select mr-sm-2" name="section_id" required>
                                                <option value="{{$exam->section_id}}">{{$exam->section->name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><br>
                                <button class="btn btn-success nextBtn btn-lg pull-right" type="submit">{{ trans('exam_trans.edit') }}</button>
                            </form>
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
    <script>
        $(document).ready(function () {
            $('select[name="level_id"]').on('change', function () {
                var level_id = $(this).val();
                if (level_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_classroomss') }}/" + level_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
                            $('select[name="classroom_id"]').append('<option selected disabled >{{trans('parent_trans.Choose')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var classroom_id = $(this).val();
                if (classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Sectionss') }}/" + classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $('select[name="section_id"]').append('<option selected disabled >{{trans('parent_trans.Choose')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
