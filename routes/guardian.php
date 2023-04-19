<?php

use App\Http\Controllers\Dashbord\Guardian\AttendanceController;
use App\Http\Controllers\Dashbord\Guardian\FeeController;
use App\Http\Controllers\Dashbord\Guardian\GuardianProfileController;
use App\Http\Controllers\Dashbord\Guardian\StudentController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Guardian Routes
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:guardian']
    ],
    function () {

        Route::prefix('/guardian/dashboard')->group(function () {
            // Dashboard
            Route::get('', function () {
                return view('dashboard.guardians.Dashboard.dashboard');
            });

            // Profile
            Route::resource('profile', GuardianProfileController::class);

            // Students
            Route::get('students', [StudentController::class, 'index']);
            Route::get('students/score/{id}', [StudentController::class, 'score']);

            // Attendance
            Route::get('/reports', [AttendanceController::class, 'report'])->name('guardian.dashboard.report');
            Route::post('/reports', [AttendanceController::class, 'postReport'])->name('guardian.dashboard.postReport');

            // Fees
            Route::get('fees', [FeeController::class, 'index']);
            Route::get('receipt/{id}', [FeeController::class, 'receipt']);
        });
    }
);
