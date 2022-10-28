@extends('layouts.teacher.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('exam_trans.edit_question') }}
@stop
@endsection
@section('page-header')
 <!-- breadcrumb -->
 <div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('exam_trans.edit_question') }} {{$question->title}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/teacher/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('exam_trans.edit_question') }}</li>
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
                            <form action="{{ route('questionss.update',$question->id) }}" method="POST" autocomplete="off">
                                @method('PUT')
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">{{ trans('exam_trans.question_name') }}</label>
                                        <input type="text" name="title" id="input-name" required
                                               class="form-control form-control-alternative" value="{{$question->title}}">
                                        <input type="hidden" name="id" value="{{$question->id}}">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="answers">{{ trans('exam_trans.answers') }}</label>
                                        <textarea name="answers" class="form-control" id="exampleFormControlTextarea1" rows="4" required>{{$question->answers}}</textarea>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="right_answer">{{ trans('exam_trans.correct_answer') }}</label>
                                        <input type="text" name="right_answer" id="input-name" class="form-control form-control-alternative" value="{{$question->right_answer}}" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="score">{{ trans('exam_trans.score') }} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="score" required>
                                                <option selected disabled>{{ trans('exam_trans.Choose') }}</option>
                                                <option value="1" {{$question->score == 1 ? 'selected':''}}>1</option>
                                                <option value="2" {{$question->score == 2 ? 'selected':''}}>2</option>
                                                <option value="5" {{$question->score == 5 ? 'selected':''}}>5</option>
                                                <option value="10" {{$question->score == 10 ? 'selected':''}}>10</option>
                                                <option value="15" {{$question->score == 15 ? 'selected':''}}>15</option>
                                                <option value="20" {{$question->score == 20 ? 'selected':''}}>20</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
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
@endsection
