<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Student;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['namespace' => 'auth'], function () {
    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');
    Route::post('/login','LoginController@login')->name('login');
    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ],
    function () {
        Route::get('/student/dashboard', function () {
            return view('DashboardStudent.dashboard');
        })->name('dashboard.Students');
        // show calender Date
        Route::view('studen-calender','livewire.studencalender')->name('calenderr');
        Route::group(['namespace' => 'DashboardStudent'], function () {
            // exam Student
            Route::resource('exams-student', 'ExamController');
            // profile student
            Route::resource('profile-student', 'ProfileController');

        });


    });
