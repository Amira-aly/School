@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('exam_trans.add_questions') }}
@stop
@endsection
@section('page-header')
 <!-- breadcrumb -->
 <div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('exam_trans.add_questions') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('exam_trans.add_questions') }}</li>
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
                            <form action="{{ route('questions.store') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">{{ trans('exam_trans.question_name') }}</label>
                                        <input type="text" name="title" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="answers">{{ trans('exam_trans.answers') }} <span style="color: red; font-size: smaller">{{ trans('exam_trans.space') }}</span></label>
                                        <textarea name="answers" class="form-control" id="exampleFormControlTextarea1"
                                                  rows="4"></textarea>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="right_answer">{{ trans('exam_trans.correct_answer') }}</label>
                                        <input type="text" name="right_answer" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exam_id">{{ trans('exam_trans.exam_name') }} : <span
                                                    class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="exam_id">
                                                <option selected disabled>{{ trans('exam_trans.Choose') }}</option>
                                                @foreach($exams as $exam)
                                                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="score">{{ trans('exam_trans.score') }} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="score">
                                                <option selected disabled>{{ trans('exam_trans.Choose') }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success  nextBtn btn-lg pull-right" type="submit">{{ trans('exam_trans.submit') }}</button>
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
@endsection
