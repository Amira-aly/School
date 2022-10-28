<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{URL('/dashboard')}}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text" >{{ trans('main_trans.main') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('main_trans.school_system') }}</li>
                    <!-- menu item level-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#level">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main_trans.School Level') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="level" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('levels.index')}}">{{ trans('main_trans.School Level List') }}</a></li>
                        </ul>
                    </li>
                    <!-- menu item classroom-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classroom-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{ trans('main_trans.classRoom') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classroom-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('classrooms.index')}}">{{ trans('main_trans.classRoom_list') }} </a> </li>
                        </ul>
                    </li>
                    <!-- menu item Section-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Section">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Section') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Section" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('sections.index')}}">{{ trans('main_trans.Section_list') }}</a></li>
                        </ul>
                    </li>
                    <!-- students-->

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fas fa-user-graduate"></i>{{trans('main_trans.students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">{{trans('main_trans.Student_information')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Student_information" class="collapse">
                                    <li> <a href="{{route('students.index')}}">{{trans('main_trans.list_students')}}</a></li>
                                    <li> <a href="{{route('students.create')}}">{{trans('main_trans.add_student')}}</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">{{trans('main_trans.Students_Promotions')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Students_upgrade" class="collapse">
                                    <li> <a href="{{route('promotions.index')}}">{{trans('main_trans.list_Promotions')}}</a> </li>
                                    <li> <a href="{{route('promotions.create')}}">{{trans('main_trans.add_Promotion')}}</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">{{trans('main_trans.Graduate_students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Graduate students" class="collapse">
                                    <li> <a href="{{route('graduateds.index')}}">{{trans('main_trans.list_Graduate')}}</a> </li>
                                    <li> <a href="{{route('graduateds.create')}}">{{trans('main_trans.add_Graduate')}}</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- Teachers-->
                    <li>
                        <a href="{{route('teachers.index')}}"><i class="fas fa-chalkboard-teacher"></i><span class="right-nav-text">{{trans('main_trans.Teachers')}} </span></a>
                    </li>

                    <!-- Parents-->
                    <li>
                        <a href="{{URL('add_parent')}}"><i class="fas fa-user-tie"></i><span class="right-nav-text">{{trans('main_trans.Parents')}} </span></a>
                    </li>

                    <!-- Accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">{{trans('main_trans.Accounts')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('fees.index')}}">{{ trans('main_trans.study_fees') }} </a> </li>
                            <li> <a href="{{route('fees.create')}}">{{ trans('fee_trans.add_fee') }} </a> </li>
                            <li> <a href="{{route('fees_student.index')}}">{{ trans('fee_trans.Invoices') }}</a></li>
                            <li> <a href="{{route('receipt_students.index')}}">{{ trans('fee_trans.receipt') }}</a></li>
                            <li> <a href="{{route('processing_fee.index')}}">{{ trans('fee_trans.exclude') }}</a></li>
                            <li> <a href="{{route('payment_students.index')}}">{{ trans('fee_trans.exchange') }}</a></li>

                        </ul>
                    </li>

                    <!-- Attendance-->
                    <li>
                        <a href="{{route('attendance.index')}}"><i class="fas fa-calendar-alt"></i><span class="right-nav-text">{{trans('main_trans.Attendance')}} </span></a>
                    </li>

                    <!-- Subjects-->
                    <li>
                        <a href="{{route('subjects.index')}}"><i class="fas fa-book-open"></i><span class="right-nav-text">{{trans('main_trans.subjects')}} </span></a>
                    </li>

                    <!-- Exams-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">{{trans('main_trans.Exams')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('exams.index')}}">{{ trans('main_trans.list_exam') }}</a> </li>
                            <li> <a href="{{route('questions.index')}}">{{ trans('main_trans.list_question') }}</a> </li>
                        </ul>
                    </li>


                    <!-- library-->
                    <li>
                        <a href="{{route('library.index')}}"><i class="fas fa-book"></i><span class="right-nav-text">{{trans('main_trans.library')}} </span></a>
                    </li>

                    <!-- Onlinec lasses-->
                    <li>
                        <a href="{{route('online_zoom.index')}}"><i class="fas fa-video"></i><span class="right-nav-text">{{trans('main_trans.Onlineclasses')}} </span></a>
                    </li>

                    <!-- Settings-->
                    <li>
                        <a href="{{route('settings.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main_trans.Settings')}} </span></a>
                    </li>

                    <!-- Users-->
                    <li>
                        <a href="{{route('users.index')}}"><i class="fas fa-users"></i><span class="right-nav-text">{{trans('main_trans.Users')}} </span></a>
                    </li>

                </ul>
            </div>
</div>
