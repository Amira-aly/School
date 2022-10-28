@extends('layouts.student.master')
@section('css')
    @livewireStyles
    @section('title')
        {{ trans('exam_trans.make_exam') }}
    @stop
@endsection
@section('content')

    @livewire('show-question', ['exam_id' => $exam_id, 'student_id' => $student_id])

@endsection
@section('js')
    @livewireScripts
@endsection
