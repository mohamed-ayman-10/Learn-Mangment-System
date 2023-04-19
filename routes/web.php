<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProcessingController;
use App\Http\Controllers\FeeInvoicesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;






Route::group(['namespace' => 'Auth'], function () {
    Route::get('login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('logout/{type}', [LoginController::class, 'logout'])->name('logout');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('selection')->middleware('guest');



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:web']
    ],
    function () {
        // Dashboard
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

        // Grades
        Route::resource('grades', GradeController::class);

        // Classrooms
        Route::resource('classrooms', ClassroomController::class);
        Route::post('delete_all', [ClassroomController::class, 'delete_all'])->name('delete.all');
        Route::post('filter', [ClassroomController::class, 'filter'])->name('filter');

        // Sections
        Route::resource('sections', SectionController::class);
        Route::get('classes/{id}', [SectionController::class, 'getclass']);

        // Teachers
        Route::resource('teachers', TeacherController::class);

        // Guardians
        Route::view('guardians', 'livewire.create_guardian')->name('guardian');

        // Students
        Route::resource('students', StudentController::class);
        Route::controller(StudentController::class)->prefix('students')->group(function () {
            Route::post('upload', 'upload')->name('student.upload');
            Route::get('download/{student_name}/{file_name}', 'download')->name('student.download');
            Route::post('delete', 'delete')->name('student.delete.file');
        });

        // Promotions
        Route::resource('promotions', PromotionController::class);

        // Graduates
        Route::controller(GraduatedController::class)->prefix('graduates')->group(function () {
            Route::get('/', 'index')->name('graduates.index');
            Route::get('/create', 'create')->name('graduates.create');
            Route::post('/softdelete', 'softDelete')->name('graduates.softdelete');
            Route::post('/restore', 'restore')->name('graduates.restore');
            Route::post('/delete', 'delete')->name('graduates.delete');
        });

        // Fees
        Route::resource('fees', FeesController::class);

        // Fees Invoices
        Route::resource('fee_invoices', FeeInvoicesController::class);
        Route::get('fee_invoices/get_amount/{id}/{classroom_id}', [FeeInvoicesController::class, 'get_amount']);

        // Receipt
        Route::resource('receipts', ReceiptController::class);

        // Processing
        Route::resource('processings', ProcessingController::class);

        // Payment
        Route::resource('payments', PaymentController::class);

        // Attendance
        Route::resource('attendances', AttendanceController::class);

        // Subject
        Route::resource('subjects', SubjectController::class);

        // Exam
        Route::resource('exams', ExamController::class);

        // Question
        Route::resource('questions', QuestionController::class);

        // Lectures
        Route::resource('lectures', LectureController::class);

        // Libraries
        Route::resource('libraries', LibraryController::class);

        // Settings
        Route::controller(SettingController::class)->prefix('settings')->group(function () {
            Route::get('', 'index')->name('settings.index');
            Route::post('', 'store')->name('settings.store');
        });

        Route::get('/{page}', [AdminController::class, 'index']);
    }
);
