<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="System School" />
    <meta name="description" content="Dashboard Admin" />
    <meta name="author" content="amira ali" />
    <meta name="education" content="To manage the school and follow up on students and accounts" />
    @include('layouts.admin.head')
</head>

<body>

    <div class="wrapper">

        <!--preloader -->

        <div id="pre-loader">
            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--preloader -->

        @include('layouts.admin.main-header')


        @include('layouts.admin.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper" style="width:81%">

            @yield('page-header')

            @yield('content')

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.admin.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
