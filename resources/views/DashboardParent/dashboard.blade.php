<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="System School" />
    <meta name="description" content="Dashboard Parent" />
    <meta name="author" content="amira ali" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.parent.head')
    @livewireStyles
</head>
<body>
    <div class="wrapper">
        <div id="pre-loader">
            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>
        @include('layouts.parent.main-header')
        <!--Main content -->
        <!-- main-content -->
        <div class="" style="padding: 20px;">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-4">{{ trans('main_trans.Welcome') }}  : {{auth()->user()->name_father}} / {{auth()->user()->name_mother}}</h4>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>

            <div class="container">
            <div class="row ">
                @foreach($sons as $son)
                <div class="col-md-6 ">
                  <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative m-2">
                    <div class="col p-4 d-flex flex-column position-static">
                      <h1 class=" mb-2 text-success font-weight-bold">{{$son->name}}</h1>
                      <h3 class="mb-2">{{$son->email}}</h3>
                      <h5 class="mb-0">{{$son->level->name}} / {{$son->classroom->name}} / {{$son->section->name}}</h5>
                      <div class="mb-1 text-muted">{{$son->date_brith}}</div>
                      <p class="card-text mb-auto">{{ trans('main_trans.son_word') }}</p>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                      <img class="bd-placeholder-img" width="150" height="200" src="{{ URL::asset('assets/images/bg/parent.jpg') }}" alt="">
                    </div>
                  </div>
                </div>
                @endforeach
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
    @include('layouts.parent.footer')


    <!--footer -->
    @include('layouts.footer-scripts')
    @livewireScripts
    @stack('scripts')
</body>
</html>
