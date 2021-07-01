<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth'])->name('dashboard');

        require __DIR__.'/auth.php';

        Route::resource('grades', GradeController::class);
        Route::resource('classrooms', ClassroomController::class);
        Route::resource('sections', SectionController::class);
        Route::get('/classes/{id}', [SectionController::class, 'getclasses']);
        Route::resource('teachers', TeacherController::class);
        Route::resource('students', StudentController::class);
        Route::get('/Get_classrooms/{id}', [StudentController::class, 'Get_classrooms']);
        Route::get('/Get_Sections/{id}', [StudentController::class, 'Get_Sections']);
        Route::view('add_parent', 'livewire.show_form');
        Route::post('Upload_attachment',  [StudentController::class, 'Upload_attachment'])->name('Upload_attachment');
        Route::post('Delete_attachment',  [StudentController::class, 'Delete_attachment'])->name('Delete_attachment');



    });




