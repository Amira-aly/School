@extends('layouts.student.master')
@section('css')
@section('title')
{{ trans('profile_trans.profile') }}
@stop
@endsection
@section('content')
    <!-- row -->
    <div class="card-body">
        <section style="background-color: #eee; ">
            <div class="row p-20">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ URL::asset('assets/images/bg/hi.png') }}"
                                 alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 style="font-family: Cairo" >{{ trans('students_trans.name') }} : {{$student->name}}</h5>
                            <p class="text-muted mb-1">{{ trans('students_trans.Grade') }} : {{$student->level->name}} / {{$student->classroom->name}} / {{$student->section->name}}</p>
                            <p class="text-muted mb-1">{{$student->academic_year}}</p>
                            <p class="text-muted mb-1">Student</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4 pb-20">
                        <div class="card-body">
                            <form action="{{route('profile-student.update',$student->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('students_trans.name') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="name"
                                            value="{{$student->name}}"
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
