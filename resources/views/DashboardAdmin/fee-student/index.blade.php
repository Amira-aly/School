@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('fee_trans.Invoices') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('fee_trans.Invoices') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fee_trans.Invoices') }}</li>
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
                                            <th>{{ trans('fee_trans.Fee_type') }}</th>
                                            <th>{{ trans('fee_trans.amount') }}</th>
                                            <th>{{ trans('fee_trans.level') }}</th>
                                            <th>{{ trans('fee_trans.classroom') }}</th>
                                            <th>{{ trans('fee_trans.statement') }}</th>
                                            <th>{{ trans('fee_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fee_invoices as $fee_invoice)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$fee_invoice->student->name}}</td>
                                            <td>{{$fee_invoice->fee->title}}</td>
                                            <td>{{ number_format($fee_invoice->amount) }}</td>
                                            <td>{{$fee_invoice->level->name}}</td>
                                            <td>{{$fee_invoice->classroom->name}}</td>
                                            <td>{{$fee_invoice->description}}</td>
                                                <td>
                                                    <a href="{{route('fees_student.edit',$fee_invoice->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('DashboardAdmin.fee-student.delete')
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
