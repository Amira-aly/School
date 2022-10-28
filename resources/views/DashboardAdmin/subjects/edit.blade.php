@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('subject_trans.edit_subject') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('subject_trans.edit_subject') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('subject_trans.edit_subject') }}</li>
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
                            <form action="{{route('subjects.update','test')}}" method="POST" autocomplete="off">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('subject_trans.name_ar') }}</label>
                                        <input type="text" name="name"
                                               value="{{ $subject->getTranslation('name', 'ar') }}"
                                               class="form-control" required>
                                        <input type="hidden" name="id" value="{{$subject->id}}">
                                    </div>
                                    <div class="col">
                                        <label for="title"> {{ trans('subject_trans.name_en') }}</label>
                                        <input type="text" name="name_en"
                                               value="{{ $subject->getTranslation('name', 'en') }}"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="level_id">{{ trans('subject_trans.level') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="level_id" required>
                                            <option selected disabled>{{trans('subject_trans.Choose')}}</option>
                                            @foreach($levels as $level)
                                                <option
                                                    value="{{$level->id}}" {{$level->id == $subject->level_id ?'selected':''}}>{{$level->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputState">{{ trans('subject_trans.classroom') }}</label>
                                        <select name="classroom_id" class="custom-select" required>
                                            <option
                                                value="{{ $subject->classroom->id }}">{{ $subject->classroom->name }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputState"> {{ trans('subject_trans.Name_Teacher') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="teacher_id" required>
                                            <option selected disabled>{{trans('subject_trans.Choose')}}...</option>
                                            @foreach($teachers as $teacher)
                                                <option
                                                    value="{{$teacher->id}}" {{$teacher->id == $subject->teacher_id ?'selected':''}}>{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-lg nextBtn btn-lg pull-right" type="submit">{{ trans('subject_trans.edit') }}</button>
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
                        url: "{{ URL::to('Get_classrooms') }}/" + level_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
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
@endsection
