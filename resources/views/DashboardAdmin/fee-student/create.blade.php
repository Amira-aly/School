@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('fee_trans.add_fee') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('fee_trans.add_fee') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fee_trans.add_fee') }}</li>
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

                        <form class="row mb-30" action="{{ route('fees_student.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="repeater">
                                    <div >
                                        <div data-repeater-item>
                                            <div class="row">

                                                <div class="col">
                                                    <label for="name" class="mr-sm-2">{{ trans('fee_trans.name_student') }}</label>
                                                    <div class="box">
                                                        <input type="hidden" name="student_id" value="{{$student->id}}">
                                                        <input type="text" value="{{ $student->name }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="" class="mr-sm-2">{{ trans('fee_trans.Fee_type') }}</label>
                                                    <div class="box">
                                                        <select class="fancyselect" name="fee_id" required>
                                                            <option>{{trans('fee_trans.Choose')}}</option>
                                                            @foreach($fees as $fee)
                                                                <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col">
                                                    <label for="" class="mr-sm-2">{{ trans('fee_trans.amount') }}</label>
                                                    <div class="box" >
                                                        <input type="number" name="amount" required>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="description" class="mr-sm-2">{{ trans('fee_trans.Notes') }}</label>
                                                    <div class="box">
                                                        <input type="text" class="form-control" name="description" >
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="hidden" name="level_id" value="{{$student->level_id}}">
                                    <input type="hidden" name="classroom_id" value="{{$student->classroom_id}}">

                                    <button type="submit" class="btn btn-primary btn-lg">{{ trans('fee_trans.submit') }}</button>
                                </div>
                            </div>
                        </form>

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
