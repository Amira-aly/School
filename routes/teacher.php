<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Teacher;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//login and logout
Route::group(['namespace' => 'auth'], function () {
    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');
    Route::post('/login','LoginController@login')->name('login');
    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ],
    function () {
        // show Dashboard teacher
        Route::get('/teacher/dashboard', function () {
        $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= \App\Models\Student::whereIn('section_id',$ids)->count();
        return view('dashboardTeacher.dashboard',$data);
        })->name('dashboard.teacher');

        // show calender Date
        Route::view('calender','livewire.calender')->name('calender');

        Route::group(['namespace' => 'DashboardTeacher'], function () {
            // Profile Dashbord teacher
            Route::resource('profiles','ProfileController');
            // student in Dashboard teacher
            Route::get('student','StudentController@student')->name('student');
            Route::get('student_exam/{id}','ExamController@student_exam')->name('student.exam');
            Route::post('repeat_exam', 'ExamController@repeat_exam')->name('repeat.exam');
            // section in Dashboard teacher
            Route::get('section','StudentController@section')->name('section');
            // Attendance in Dashboard teacher
            Route::post('/add_attendances','StudentController@attendance')->name('attendances.add');
            Route::get('attendance_report','StudentController@attendanceReport')->name('attendance.report');
            Route::post('attendance_report','StudentController@attendanceSearch')->name('attendance.search');
            // Exam in Dashboard teacher
            Route::resource('examss', 'ExamController');
            Route::get('/Get_classroomss/{id}', 'ExamController@Get_classrooms');
            Route::get('/Get_Sectionss/{id}', 'ExamController@Get_Sections');
            // questions in Dashbord teacher
            Route::resource('questionss','QuestionController');
            // Zoom Dashbord Admin
            Route::resource('online_zooms','ZoomController');
            Route::get('/indirect', 'ZoomController@indirectCreate')->name('indirect.teacher.create');
            Route::post('/indirect', 'ZoomController@storeIndirect')->name('indirect.teacher.store');

        });

    });
