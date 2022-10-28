<?php

use App\Http\Controllers\ZoomController;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// select Dashbord Admin or Teacher or Student or Parent
Route::get('/','HomeController@index')->name('selection');



// login and logout
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
});


Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
],
    // show Dashboard Admin
    function(){
    Route::get('/dashboard', function () {
        return view('DashboardAdmin.dashboard');
    });
    // Livewire Parents
    Route::view('add_parent','livewire.show_form')->name('add_parent');

    // settings Dashbord Admin
    Route::resource('settings','SettingController');

    Route::group(['namespace' => 'DashboardAdmin'], function () {
        // Profile Dashbord Admin
        Route::resource('profile','ProfileController');
        // Users Dashbord Admin
        Route::resource('users','UsersController');
    });
    // show calender Date
    Route::view('calender','livewire.calender')->name('calender');
    // level Dashbord Admin
    Route::resource('levels', 'LevelController');
    // classrooms Dashbord Admin
    Route::resource('classrooms', 'ClassroomController');
    Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
    Route::post('classrooms.filter', 'ClassroomController@filter')->name('classrooms.filter');
    // sections Dashbord Admin
    Route::resource('sections', 'SectionController');
    Route::get('/sectionss/{id}', 'SectionController@getclassroom');
    // Zoom Dashbord Admin
    Route::resource('online_zoom','ZoomController');
    Route::get('/indirectt', 'ZoomController@indirectCreate')->name('indirect.create');
    Route::post('/indirectt', 'ZoomController@storeIndirect')->name('indirect.store');
    // Library Dashbord Admin
    Route::resource('library','LibraryController');
    Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
    // Exams Dashbord Admin
    Route::resource('exams','ExamController');
    // questions Dashbord Admin
    Route::resource('questions','QuestionController');
    // attendance Dashbord Admin
    Route::resource('attendance', 'AttendanceController');
    // teachers Dashbord Admin
    Route::resource('teachers', 'TeacherController');
    //students and fees Dashbord Admin
    Route::resource('students', 'StudentController');
    Route::resource('promotions','PromotionController');
    Route::resource('fees_student', 'Student_AccountController');
    Route::resource('fees', 'FeeController');
    Route::resource('receipt_students','ReceiptStudentController');
    Route::resource('processing_fee', 'ProcessingFeeController');
    Route::resource('payment_students', 'PaymentController');
    Route::get('/studentsss/{id}', 'PromotionController@Graduated')->name('promotion.graduated');
    Route::resource('graduateds', 'Student_LevelController');
    Route::get('/studentss/{id}', 'StudentController@Graduated')->name('students.graduated');
    Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
    Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
    Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
    Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
    Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
    // subjects Dashbord Admin
    Route::resource('subjects', 'SubjectController');
});

