<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Parentt;
use App\Models\Student;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//login and logout
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');
    Route::post('/login','LoginController@login')->name('login');
    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parentt']
    ],
    function () {
        Route::get('/parent/dashboard', function () {
            $sons = Student::where('parent_id',auth()->user()->id)->get();
            return view('DashboardParent.dashboard',compact('sons'));
        })->name('dashboard.parents');
        // Dashboard Parent
        Route::group(['namespace' => 'DashboardParent'], function () {
            Route::resource('profilesss', 'ProfileController');
            Route::get('children', 'ChildrenController@index')->name('sonss.index');
            Route::get('results/{id}', 'ChildrenController@results')->name('sons.results');
            Route::get('attendances', 'ChildrenController@attendances')->name('sons.attendances');
            Route::post('attendances','ChildrenController@attendanceSearch')->name('sons.attendance.search');
            Route::get('feess', 'ChildrenController@fees')->name('sons.fees');
            Route::get('receipt/{id}', 'ChildrenController@receiptStudent')->name('sons.receipt');
        });
        // student
        Route::resource('studentss', 'StudentController');
        // show calender
        Route::view('studen-calender','livewire.studencalender')->name('calenderr');

    });
