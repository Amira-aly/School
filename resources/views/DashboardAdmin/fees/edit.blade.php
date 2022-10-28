@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('fee_trans.editt') }}
@stop
@endsection
@section('page-header')
 <!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('fee_trans.editt') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fee_trans.editt') }}</li>
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

                    <form action="{{route('fees.update',$fee->id)}}" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fee_trans.name_ar') }}</label>
                                <input type="text" value="{{$fee->getTranslation('title','ar')}}" name="title" class="form-control">
                                <input type="hidden" value="{{$fee->id}}" name="id" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fee_trans.name_en') }}</label>
                                <input type="text" value="{{$fee->getTranslation('title','en')}}" name="title_en" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fee_trans.amount') }}</label>
                                <input type="number" value="{{$fee->amount}}" name="amount" class="form-control">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState">{{ trans('fee_trans.level') }}</label>
                                <select class="custom-select mr-sm-2" name="level_id">
                                    @foreach($levels as $level)
                                        <option value="{{ $level->id }}" {{$level->id == $fee->level_id ? 'selected' : ""}}>{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fee_trans.classroom') }}</label>
                                <select class="custom-select mr-sm-2" name="classroom_id">
                                    <option value="{{$fee->classroom_id}}">{{$fee->classroom->name}}</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fee_trans.academic_year') }}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" {{$year == $fee->year ? 'selected' : ' '}}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>


                            @if ($fee->fee_type == 1)
                                <div class="form-group col">
                                    <label for="inputZip">{{ trans('fee_trans.Fee_type') }}</label>
                                    <select class="custom-select mr-sm-2" name="fee_type">
                                        <option value="{{$fee->fee_type}}">{{ trans('fee_trans.Tuition_fees') }}</option>
                                        <option value="2">{{ trans('fee_trans.bus_fee') }}</option>
                                    </select>
                                </div>
                            @else
                                <div class="form-group col">
                                    <label for="inputZip">{{ trans('fee_trans.Fee_type') }}</label>
                                    <select class="custom-select mr-sm-2" name="fee_type">
                                        <option value="{{$fee->fee_type}}">{{ trans('fee_trans.bus_fee') }}</option>
                                        <option value="1">{{ trans('fee_trans.Tuition_fees') }}</option>
                                    </select>
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{ trans('fee_trans.Notes') }}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                      rows="4">{{$fee->description}}</textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary btn-lg">{{ trans('fee_trans.edit') }}</button>

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
    <script>
        function CheckAll(classroom, elem) {
            var elements = document.getElementsByClassName(classroom);
            var l = elements.length;
            if (elem.checked) {
                for (var i = 0; i < l; i++) {
                    elements[i].checked = true;
                }
            } else {
                for (var i = 0; i < l; i++) {
                    elements[i].checked = false;
                }
            }
        }
    </script>
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
                            $('select[name="classroom_id"]').append('<option selected disabled >{{trans('parent_trans.Choose')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
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
