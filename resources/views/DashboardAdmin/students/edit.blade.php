@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students_trans.Student_Edit')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.Student_Edit') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students_trans.Student_Edit') }}</li>
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

                    <form action="{{route('students.update',$students->id)}}" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students_trans.personal_information')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                    <input value="{{$students->getTranslation('name','ar')}}" type="text" name="name"  class="form-control" required>
                                    <input type="hidden" name="id" value="{{$students->id}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students_trans.name_en')}} : <span class="text-danger">*</span></label>
                                    <input value="{{$students->getTranslation('name','en')}}" class="form-control" name="name_en" type="text" required >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students_trans.email')}} : </label>
                                    <input type="email" value="{{ $students->email }}" name="email" class="form-control"required >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students_trans.password')}} :</label>
                                    <input  type="password" name="password" class="form-control"required >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{trans('students_trans.gender')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id" required>
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}</option>
                                        @foreach($Genders as $Gender)
                                            <option value="{{$Gender->id}}" {{$Gender->id == $students->gender_id ? 'selected' : ""}}>{{ $Gender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nationality_id">{{trans('students_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationality_id" required>
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}</option>
                                        @foreach($nationals as $nal)
                                            <option value="{{ $nal->id }}" {{$nal->id == $students->nationality_id ? 'selected' : ""}}>{{ $nal->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('students_trans.Date_of_Birth')}}  :</label>
                                    <input class="form-control" type="text" value="{{$students->date_birth}}" id="datepicker-action" name="date_birth" data-date-format="yyyy-mm-dd" required>
                                </div>
                            </div>

                        </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students_trans.Student_information')}}</h6><br>
                    <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="level_id">{{trans('students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="level_id" required>
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}</option>
                                        @foreach($levels as $level)
                                            <option value="{{ $level->id }}" {{$level->id == $students->level_id ? 'selected' : ""}}>{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="classroom_id">{{trans('students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id" required>
                                        <option value="{{$students->classroom_id}}">{{$students->classroom->name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">{{trans('students_trans.section')}} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id" required>
                                        <option value="{{$students->section_id}}"> {{$students->section->name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('students_trans.parent')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id" required>
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}</option>
                                       @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}" {{ $parent->id == $students->parent_id ? 'selected' : ""}}>{{ $parent->name_father }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" {{$year == $students->academic_year ? 'selected' : ' '}}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        </div><br>
                    <button class="btn btn-success  nextBtn btn-lg pull-right" type="submit">{{trans('students_trans.submit')}}</button>
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
                }
                else {
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
                        url: "{{ URL::to('Get_Sections') }}/" + classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
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
