@extends('layouts.student.master')
@section('css')
    @section('title')
        {{ trans('exam_trans.exam_list') }}
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
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('exam_trans.subject_name') }}</th>
                                            <th>{{ trans('exam_trans.exam_name') }}</th>
                                            <th>{{ trans('exam_trans.login') }} / {{ trans('exam_trans.score') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$exam->subject->name}}</td>
                                                <td>{{$exam->name}}</td>
                                                <td>
                                                        <a href="{{route('exams-student.show',$exam->id)}}"
                                                           class="btn btn-outline-success btn-sm" role="button"
                                                           aria-pressed="true" onclick="alertAbuse()">
                                                            <i class="fas fa-person-booth"></i></a>
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
@section('js')
    {{--    <script>--}}
    {{--        function alertAbuse() {--}}
    {{--            alert("برجاء عدم إعادة تحميل الصفحة بعد دخول الاختبار - في حال تم تنفيذ ذلك سيتم الغاء الاختبار بشكل اوتوماتيك ");--}}
    {{--        }--}}
    {{--    </script>--}}
@endsection
