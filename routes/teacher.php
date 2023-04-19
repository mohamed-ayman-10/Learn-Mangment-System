<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashbord\Teacher\ExamController;
use App\Http\Controllers\Dashbord\Teacher\TeacherController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashbord\Teacher\AttendanceController;
use App\Http\Controllers\Dashbord\Teacher\LectuerController;
use App\Http\Controllers\dashbord\Teacher\QuestionController;
use App\Http\Controllers\Dashbord\Teacher\TeacherProfileController;

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ],
    function () {

        Route::prefix('/teacher/dashboard')->group(function () {

            Route::controller(TeacherController::class)->group(function () {
                Route::get('', 'index')->name('teacher.dashboard.index');
                Route::get('students', 'student')->name('teacher.dashboard.students');
                Route::get('sections', 'section')->name('teacher.dashboard.sections');
            });

            // Profile
            Route::resource('profile', TeacherProfileController::class);

            // Attendances
            Route::controller(AttendanceController::class)->prefix('/attendances')->group(function () {
                Route::get('', 'attendance')->name('teacher.dashboard.attendance');
                Route::post('', 'store')->name('teacher.dashboard.attendance.store');
                Route::get('/reports', 'report')->name('teacher.dashboard.report');
                Route::post('/reports', 'postReport')->name('teacher.dashboard.postReport');
            });

            // Exams
            Route::controller(ExamController::class)->prefix('/exams')->group(function () {
                Route::get('', 'exams')->name('teacher.dashboard.exams');
                Route::get('/create', 'create')->name('teacher.dashboard.exams.create');
                Route::post('/create', 'store')->name('teacher.dashboard.exams.store');
                Route::get('{id}/edit', 'edit')->name('teacher.dashboard.exams.edit');
                Route::post('{id}/update', 'update')->name('teacher.dashboard.exams.update');
                Route::post('{id}/destroy', 'destroy')->name('teacher.dashboard.exams.destroy');
                Route::get('{id}/questions', 'show')->name('teacher.dashboard.exams.show');
                Route::get('{id}/exam', 'studentExam')->name('teacher.dashboard.exams.exam');
                Route::get('{id}/destroyDegree', 'destroyDegree')->name('teacher.dashboard.exams.destroyDegree');
            });

            // Questions
            Route::resource('teacher/dashboard/questions', QuestionController::class);
        });
        // Lectuers
        Route::resource('teacher/dashboard/lectuer', LectuerController::class);
    }
);
