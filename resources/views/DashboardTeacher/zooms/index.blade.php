@extends('layouts.teacher.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('zoom_trans.online') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('zoom_trans.online') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/teacher/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('zoom_trans.online') }}</li>
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
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('online_zooms.create')}}" class="btn btn-success btn-lg" role="button" aria-pressed="true" style="margin-bottom: 10px;">{{ trans('zoom_trans.add_online_zoom') }}</a>
                                <a class="btn btn-warning btn-lg" href="{{route('indirect.teacher.create')}}" style="margin-bottom: 10px;">{{ trans('zoom_trans.add_offline_zoom') }}</a>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('zoom_trans.level') }}</th>
                                            <th>{{ trans('zoom_trans.classroom') }}</th>
                                            <th>{{ trans('zoom_trans.section') }}</th>
                                            <th>{{ trans('zoom_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('zoom_trans.topic') }}</th>
                                            <th>{{ trans('zoom_trans.start_time') }}</th>
                                            <th>{{ trans('zoom_trans.duration') }}</th>
                                            <th>{{ trans('zoom_trans.link') }}</th>
                                            <th>{{ trans('zoom_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_classes as $online_classe)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$online_classe->level->name}}</td>
                                            <td>{{$online_classe->classroom->name }}</td>
                                            <td>{{$online_classe->section->name}}</td>
                                            <td>{{$online_classe->created_by}}</td>
                                            <td>{{$online_classe->topic}}</td>
                                            <td>{{$online_classe->start_at}}</td>
                                            <td>{{$online_classe->duration}}</td>
                                            <td class="text-danger"><a href="{{$online_classe->join_url}}" target="_blank">{{ trans('zoom_trans.join') }}</a></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$online_classe->meeting_id}}" ><i class="fa fa-trash"></i></button>
                                            </td>
                                            </tr>
                                        @include('DashboardTeacher.zooms.delete')
                                        @endforeach
                                    </table>
                                    <br>
                                    <br>
                                    <a  class="alert alert-primary "   style="margin-bottom: 10px;">{{ trans('zoom_trans.all_meeting') }}</a>
                                    <div class="table-responsive" style="margin-top: 20px;">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('zoom_trans.level') }}</th>
                                            <th>{{ trans('zoom_trans.classroom') }}</th>
                                            <th>{{ trans('zoom_trans.section') }}</th>
                                            <th>{{ trans('zoom_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('zoom_trans.topic') }}</th>
                                            <th>{{ trans('zoom_trans.start_time') }}</th>
                                            <th>{{ trans('zoom_trans.duration') }}</th>
                                            <th>{{ trans('zoom_trans.link') }}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_zooms as $online_zoom)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$online_zoom->level->name}}</td>
                                            <td>{{ $online_zoom->classroom->name }}</td>
                                            <td>{{$online_zoom->section->name}}</td>
                                            <td>{{$online_zoom->created_by}}</td>
                                            <td>{{$online_zoom->topic}}</td>
                                            <td>{{$online_zoom->start_at}}</td>
                                            <td>{{$online_zoom->duration}}</td>
                                            <td class="text-danger"><a href="{{$online_zoom->join_url}}" target="_blank">{{ trans('zoom_trans.join') }}</a></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
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
