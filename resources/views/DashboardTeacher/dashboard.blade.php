<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="System School" />
    <meta name="description" content="Dashboard Teacher" />
    <meta name="author" content="amira ali" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.teacher.head')
    @livewireStyles
</head>
<body>
    <div class="wrapper">
        <div id="pre-loader">
            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>
        @include('layouts.teacher.main-header')
        @include('layouts.teacher.main-sidebar')
        <!--Main content -->
        <!-- main-content -->
        <div class="content-wrapper" style="width: 81%">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-4">{{ trans('main_trans.Welcome') }} : {{auth()->user()->name}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('main_trans.cont_student') }}</p>
                                    <h4>{{$count_students}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('student')}}"><span class="text-danger">{{ trans('main_trans.display') }}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('main_trans.cont_section') }}</p>
                                    <h4>{{$count_sections}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('section')}}" target="_blank"><span class="text-danger">{{ trans('main_trans.display') }}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->
            <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <livewire:calendar/>
                            <h1 class="mb-4"></h1>
                        </div>
                    </div>
                </div>
            </div>

            <!--footer -->
            @include('layouts.teacher.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
    <!--footer -->
    @include('layouts.footer-scripts')
    @livewireScripts
    @stack('scripts')
</body>
</html>
