@extends('layouts.parent.master')
@section('css')
@section('title')
{{ trans('main_trans.study_fees') }}
@stop
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
                                    @foreach($Fee_invoices as $Fee_invoice)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$Fee_invoice->student->name}}</td>
                                        <td>{{$Fee_invoice->fee->title}}</td>
                                        <td>{{ number_format($Fee_invoice->amount, 2) }}</td>
                                        <td>{{$Fee_invoice->level->name}}</td>
                                        <td>{{$Fee_invoice->classroom->name}}</td>
                                        <td>{{$Fee_invoice->description}}</td>
                                        <td>
                                            <a href="{{route('sons.receipt',$Fee_invoice->student_id)}}" title="Payments" class="btn btn-info btn-lg" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        </td>
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

