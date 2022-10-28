@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students_trans.Student_details')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.Student_details') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students_trans.Student_details') }}</li>
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
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">{{trans('students_trans.Student_details')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">{{trans('students_trans.Attachments')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('students.edit',$student->id)}}" class="btn btn-info btn-lg" role="button" aria-pressed="true">{{trans('students_trans.Student_Edit')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{trans('students_trans.name')}}</th>
                                            <td>{{ $student->name }}</td>
                                            <th scope="row">{{trans('students_trans.email')}}</th>
                                            <td>{{$student->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{trans('students_trans.gender')}}</th>
                                            <td>{{$student->gender->name}}</td>
                                            <th scope="row">{{trans('students_trans.Nationality')}}</th>
                                            <td>{{$student->nationality->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('students_trans.Grade')}}</th>
                                            <td>{{ $student->level->name }}</td>
                                            <th scope="row">{{trans('students_trans.classrooms')}}</th>
                                            <td>{{$student->classroom->name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{trans('students_trans.section')}}</th>
                                            <td>{{$student->section->name}}</td>
                                            <th scope="row">{{trans('students_trans.Date_of_Birth')}}</th>
                                            <td>{{ $student->date_birth}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('students_trans.parent')}}</th>
                                            <td>{{ $student->parent->name_father}}</td>
                                            <th scope="row">{{trans('students_trans.academic_year')}}</th>
                                            <td>{{ $student->academic_year }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="POST" action="{{route('Upload_attachment')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year">{{trans('students_trans.Attachments')}}
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="photos[]" multiple required>
                                                        <input type="hidden" name="student_name" value="{{$student->name}}">
                                                        <input type="hidden" name="student_id" value="{{$student->id}}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                       {{trans('students_trans.submit')}}
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('students_trans.filename')}}</th>
                                                <th scope="col">{{trans('students_trans.created_at')}}</th>
                                                <th scope="col">{{trans('students_trans.Processes')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($student->images as $attachment)
                                                    <tr style='text-align:center;vertical-align:middle'>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$attachment->image_name}}</td>
                                                        <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                        <td colspan="2">
                                                            <a class="btn btn-outline-info btn-sm"
                                                            href="{{url('Download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->image_name}}" title="{{trans('students_trans.Download')}}"
                                                            role="button"><i class="fas fa-download"></i>&nbsp; {{trans('students_trans.Download')}}</a>

                                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#Delete_img{{ $attachment->id }}"
                                                                    title="{{ trans('students_trans.Delete') }}">{{trans('students_trans.Delete')}}
                                                            </button>

                                                        </td>
                                                    </tr>
                                                    @include('DashboardAdmin.students.delete_image')
                                                @endforeach
                                            </tbody>
                                        </table>
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
