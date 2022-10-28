@extends('layouts.teacher.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('profile_trans.profile') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('profile_trans.profile') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/teacher/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('profile_trans.profile') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="card-body">
        <section style="background-color: #eee; ">
            <div class="row p-20">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ URL::asset('assets/images/bg/teacher.jpg') }}"
                                 alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 style="font-family: Cairo" class="my-3">{{$teacher->name}}</h5>
                            <p class="text-muted mb-1">{{$teacher->email}}</p>
                            <p class="text-muted mb-1">Teacher</p>
                            <p class="text-muted mb-1">{{$teacher->specialization->name}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4 pb-20">
                        <div class="card-body">
                            <form action="{{route('profiles.update',$teacher->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('profile_trans.user_name') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="name"
                                            value="{{$teacher->name}}"
                                                   class="form-control">
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('teacher_trans.Address') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="address"
                                            value="{{$teacher->address}}"
                                                   class="form-control">
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('profile_trans.password') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="password" id="password" class="form-control" name="password" >
                                        </p><br><br>
                                        <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                               id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">{{ trans('profile_trans.show_password') }}</label>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success" style="float: right;">{{ trans('profile_trans.edit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
