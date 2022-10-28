 <!--header start-->
 <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{URL('/teacher/dashboard')}}">{{ trans('main_trans.Dashboard') }}</a>
    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">
        <div class="btn-group mb-1">
            <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @if (App::getLocale() == 'ar')
              {{ LaravelLocalization::getCurrentLocaleName() }}
              @else
              {{ LaravelLocalization::getCurrentLocaleName() }}
              @endif
            </button>
            <div class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                @endforeach
            </div>
        </div>
        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="ti-bell"></i>
                <span class="badge badge-danger notification-status"> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                <div class="dropdown-header notifications">
                    <strong>Notifications</strong>
                    <span class="badge badge-pill badge-warning"></span>
                </div>
                <div class="dropdown-divider"></div>
            </div>
        </li>
        <li class="nav-item dropdown mr-30 ml-20">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ URL::asset('assets/images/bg/teacher.jpg') }}" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right ">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{auth()->user()->name}}</h5>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('profiles.index')}}"><i class="text-warning ti-user"></i> {{ trans('main_trans.profile') }}</a>
                @if(auth('student')->check())
                    <form method="GET" action="{{ route('logout','student') }}">
                    @elseif(auth('teacher')->check())
                        <form method="GET" action="{{ route('logout','teacher') }}">
                    @elseif(auth('parentt')->check())
                        <form method="GET" action="{{ route('logout','parentt') }}">
                    @else
                        <form method="GET" action="{{ route('logout','web') }}">
                @endif
                @csrf
                        <a class="dropdown-item" href="#" onclick="event.preventDefault();this.closest('form').submit();"><i class="text-danger ti-arrow-circle-left"></i> {{ trans('main_trans.logout') }}</a>
                </form>
            </div>
        </li>
    </ul>
</nav>
<!--header End-->
