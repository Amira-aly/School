@extends('layouts.parent.master')
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
                            <h5 style="font-family: Cairo" >{{ trans('parent_trans.name_father') }} : {{$parent->name_father}}</h5>
                            <p class="text-muted mb-1">{{ trans('parent_trans.job_father') }} : {{$parent->job_father}}</p>
                            <h5 style="font-family: Cairo" >{{ trans('parent_trans.name_mother') }} : {{$parent->name_mother}}</h5>
                            <p class="text-muted mb-1">{{ trans('parent_trans.job_mother') }} : {{$parent->job_mother}}</p>
                            <p class="text-muted mb-1">Parents</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4 pb-20">
                        <div class="card-body">
                            <form action="{{route('profilesss.update',$parent->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('parent_trans.name_father') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="name_father"
                                            value="{{$parent->name_father}}"
                                                   class="form-control" required>
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('parent_trans.name_mother') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="name_mother" required
                                            value="{{$parent->name_mother}}"
                                                   class="form-control">
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('parent_trans.Address_Father') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="address_father" required
                                            value="{{$parent->address_father}}"
                                                   class="form-control">
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('parent_trans.Address_Mother') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="address_mother"
                                            value="{{$parent->address_mother}}"
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
