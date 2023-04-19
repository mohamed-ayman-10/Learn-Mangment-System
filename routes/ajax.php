<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:web,teacher']
    ],
    function () {

        Route::controller(AjaxController::class)->prefix('students')->group(
            function () {
                Route::get('get_classroom/{id}', 'get_classroom');
                Route::get('get_section/{id}', 'get_section');
            }
        );
    }
);
