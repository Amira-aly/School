@extends('layouts.admin.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('class_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.classRoom_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{ trans('main_trans.main') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.classRoom_list') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('class_trans.add_class') }}
            </button>
            <button type="button" class="button x-small" id="btn_delete_all">
                {{ trans('class_trans.delete_checkbox') }}
            </button>

            <br><br>

            <form action="{{ route('classrooms.filter') }}" method="POST">
                {{ csrf_field() }}
                <select class="form-select" data-style="btn-info" name="level_id"
                        onchange="this.form.submit()">
                    <option value="" selected disabled>{{ trans('class_trans.Search_By_level') }}</option>
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </form>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                            <th>#</th>
                            <th>{{ trans('class_trans.name_classs') }}</th>
                            <th>{{ trans('class_trans.Namelevel') }}</th>
                            <th>{{ trans('class_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($details))

                        <?php $classrooms = $details; ?>
                    @else

                        <?php $classrooms = $classrooms; ?>
                    @endif
                        <?php $i = 0; ?>
                        @foreach ($classrooms as $classroom)
                            <tr>
                                <?php $i++; ?>
                                <td><input type="checkbox"  value="{{ $classroom->id }}" class="box1" ></td>
                                <td>{{ $i }}</td>
                                <td>{{ $classroom->name }}</td>
                                <td>{{ $classroom->level->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $classroom->id }}"
                                        title="{{ trans('level_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $classroom->id }}"
                                        title="{{ trans('level_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('level_trans.edit_level') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('classrooms.update', $classroom->id) }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                            class="mr-sm-2">{{ trans('class_trans.stage_name_ar') }}
                                                            :</label>
                                                        <input id="name" type="text" name="name"
                                                            class="form-control"
                                                            value="{{ $classroom->getTranslation('name', 'ar') }}"
                                                            >
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $classroom->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en"
                                                            class="mr-sm-2">{{ trans('class_trans.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $classroom->getTranslation('name', 'en') }}"
                                                            name="name_en"  >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('class_trans.Namelevel') }}
                                                        :</label>
                                                    <select class="form-control form-control-lg"
                                                            id="exampleFormControlSelect1" name="level_id">
                                                        <option value="{{ $classroom->level->id }}">
                                                            {{ $classroom->level->name }}
                                                        </option>
                                                        @foreach ($levels as $level)
                                                            <option value="{{ $level->id }}">
                                                                {{ $level->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('class_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('level_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('class_trans.delete_class') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('classrooms.destroy',$classroom->id , 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('class_trans.Warning_level') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $classroom->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('class_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('class_trans.Delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('class_trans.add_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('classrooms.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label for="name" class="mr-sm-2">{{ trans('class_trans.name_class') }} :</label>
                                <input class="form-control" type="text" name="name"   />
                            </div>
                        </div>
                        <div class="col">
                            <label for="name"class="mr-sm-2">{{ trans('class_trans.name_class_en') }} :</label>
                                <input class="form-control" type="text" name="name_en"   />
                        </div>
                    </div>
                    <div class="col">
                        <label for="level_id" class="mr-sm-2" style="margin-top:10px; ">{{ trans('class_trans.Namelevel') }} :</label>

                        <div class="box">
                            <select class="fancyselect" name="level_id">
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('class_trans.Close') }}</button>
                        <button type="submit"
                                class="btn btn-success">{{ trans('class_trans.submit') }}</button>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
</div>
<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('class_trans.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('delete_all') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    {{ trans('class_trans.Warning_level') }}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('class_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('class_trans.Delete') }}</button>
                </div>
            </form>
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
                        $('select[name="Classroom_id"]').empty();
                        $('select[name="Classroom_id"]').append('<option selected disabled >{{trans('main_trans.Choose')}}...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script>
    function CheckAll(classroom, elem) {
        var elements = document.getElementsByClassName(classroom);
        var l = elements.length;
        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>
<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });
            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>

@endsection
