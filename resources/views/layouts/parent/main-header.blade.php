<nav class="navbar navbar-expand-lg navbar-light " style="padding-left: 10px ; background: #8f98c6;">
    <h2 class="text-light" style="margin: 1%;"><a href="{{URL('/parent/dashboard')}}" style="font-size: x-large;">AL School</a></h2>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" >
        <li class="nav-item ">
          <a class="nav-link" href="{{URL('/parent/dashboard')}}" style="color: beige; font-size: large;padding-right: 28px;">{{ trans('main_trans.main') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('sonss.index')}}" style="color: beige; font-size: large;padding-right: 28px;">{{ trans('main_trans.sons') }}</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{route('sons.attendances')}}" style="color: beige; font-size: large;padding-right: 28px;">{{ trans('main_trans.Attendance') }}</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{route('sons.fees')}}" style="color: beige; font-size: large;padding-right: 28px;">{{ trans('main_trans.Accounts') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{route('profilesss.index')}}" style=" font-size: large;">{{ trans('main_trans.profile') }}</a>
          </li>
      </ul>
      <ul class="nav navbar-nav ">
      <li class="nav-item dropdown ">
        <div class="btn-group mb-1 ml-4">
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
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <h5 >{{auth()->user()->name_father}} / {{auth()->user()->name_mother}}</h5>
            </a>
            <div class="dropdown-menu dropdown-menu-right ">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{auth()->user()->name_father}} / {{auth()->user()->name_mother}}</h5>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('profilesss.index')}}"><i class="text-warning ti-user"></i> {{ trans('main_trans.profile') }}</a>
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
    </li>
    </div>
  </nav>
