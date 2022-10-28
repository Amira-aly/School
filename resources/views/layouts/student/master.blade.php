<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.student.head')
</head>
<body>
    <div class="wrapper" style="width:100%">
        <!--preloader -->
        <div id="pre-loader">
            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--preloader -->

        @include('layouts.student.main-header')

        @yield('page-header')
        @yield('content')




        <!--footer -->
        @include('layouts.student.footer')

    </div>

    <!--footer -->

    @include('layouts.footer-scripts')

</body>

</html>
