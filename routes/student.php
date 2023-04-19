<?php

use App\Http\Controllers\Dashbord\Student\ExamController;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashbord\Student\StudentProfileController;


/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Livewire::component('calendar', Calendar::class);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ],
    function () {

        Route::prefix('/student/dashboard')->group(function () {

            // Dashboard
            Route::get('', function () {
                return view('dashboard.Students.Dashboard.dashboard');
            });

            // Profile
            Route::resource('profile', StudentProfileController::class);

            // Exams
            Route::resource('exams', ExamController::class);
        });
    }
);
