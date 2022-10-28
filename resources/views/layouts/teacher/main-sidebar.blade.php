<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" >
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{URL('/teacher/dashboard')}}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text" >{{ trans('main_trans.dashboard_teachert') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.school_system')}} </li>

                    <!-- Sections-->
                    <li>
                        <a  href="{{route('section')}}"><i class="ti-calendar"></i><span
                            class="right-nav-text">{{ trans('main_trans.Section') }}</span></a>
                    </li>

                    <!-- students-->
                    <li>
                        <a  href="{{route('student')}}"><i class="fas fa-user-graduate"></i><span
                            class="right-nav-text">{{ trans('main_trans.student') }}</span></a>
                    </li>

                    <!-- attendance-->
                    <li>
                        <a href="{{route('attendance.report')}}"><i class="fas fa-chalkboard"></i><span class="right-nav-text">{{trans('main_trans.Attendance')}} </span></a>
                    </li>

                    <!-- Exams-->
                    <li>
                        <a href="{{route('examss.index')}}"><i class="fas fa-book-open"></i><span class="right-nav-text">{{trans('main_trans.list_exam')}} </span></a>
                    </li>

                    <!-- Zoom-->
                    <li>
                        <a href="{{route('online_zooms.index')}}"><i class="fas fa-video"></i><span class="right-nav-text">{{trans('main_trans.Onlineclasses')}} </span></a>
                    </li>

                    {{-- profile --}}
                    <li>
                        <a href="{{route('profiles.index')}}"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">{{trans('main_trans.profile')}} </span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
