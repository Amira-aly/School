<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="System School" />
    <meta name="description" content="Dashboard Student" />
    <meta name="author" content="amira ali" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.student.head')
    @livewireStyles
</head>
<body>
    <div class="wrapper">
        <div id="pre-loader">
            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>
        @include('layouts.student.main-header')
        <!--Main content -->
        <!-- main-content -->
        <div class="" style="padding: 20px;">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-4">{{ trans('main_trans.Welcome') }}  : {{auth()->user()->name}} </h4>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>



            <!-- Orders Status widgets-->
            <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <livewire:studen-calendar/>
                            <h1 class="mb-4"></h1>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    @include('layouts.student.footer')


    <!--footer -->
    @include('layouts.footer-scripts')
    @livewireScripts
    @stack('scripts')
</body>
</html>
