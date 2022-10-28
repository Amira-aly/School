@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('attendance_trans.attendance') }}
@stop
@endsection
@section('page-header')
   <!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('attendance_trans.attendance') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('attendance_trans.attendance') }}</li>
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
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($levels as $level)

                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $level->name }}</a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('attendance_trans.Name_Section') }}
                                                                    </th>
                                                                    <th>{{ trans('attendance_trans.Name_Class') }}</th>
                                                                    <th>{{ trans('attendance_trans.Status') }}</th>
                                                                    <th>{{ trans('attendance_trans.Processes') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($level->sections as $list_Sections)
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $list_Sections->name }}</td>
                                                                        <td>{{ $list_Sections->classroom->name }}</td>
                                                                        <td>
                                                                            <label class="badge badge-{{$list_Sections->status == 1 ? 'success':'danger'}}">{{$list_Sections->status == 1 ? 'Active':'In Active'}}</label>
                                                                        </td>

                                                                        <td>
                                                                            <a href="{{route('attendance.show',$list_Sections->id)}}" class="btn btn-warning btn-lg" role="button" aria-pressed="true"> {{ trans('attendance_trans.list_student') }}</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
