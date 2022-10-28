@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('fee_trans.exchange') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('fee_trans.exchange') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fee_trans.exchange') }}</li>
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('fee_trans.name') }}</th>
                                            <th>{{ trans('fee_trans.amount') }}</th>
                                            <th>{{ trans('fee_trans.statement') }}</th>
                                            <th>{{ trans('fee_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payment_students as $payment_student)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$payment_student->student->name}}</td>
                                            <td>{{ number_format($payment_student->amount, 2) }}</td>
                                            <td>{{$payment_student->description}}</td>
                                                <td>
                                                    <a href="{{route('payment_students.edit',$payment_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$payment_student->id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('payment.delete')
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
