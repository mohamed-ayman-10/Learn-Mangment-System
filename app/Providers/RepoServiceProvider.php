<?php

namespace App\Providers;

use App\Repository\ExamRepository;
use App\Repository\FeesRepository;
use App\Repository\LibraryRepository;
use App\Repository\PaymentRepository;
use App\Repository\ReceiptRepository;
use App\Repository\StudentRepository;
use App\Repository\SubjectRepository;
use App\Repository\TeacherRepository;
use App\Repository\LectuersRepository;
use App\Repository\QuestionRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\AttendanceRepository;
use App\Repository\ProcessingRepository;
use App\Repository\FeeInvoicesRepository;
use App\Repository\ExamRepositoryInterface;
use App\Repository\FeesRepositoryInterface;
use App\Repository\LibraryRepositoryInterface;
use App\Repository\PaymentRepositoryInterface;
use App\Repository\ReceiptRepositoryInterface;
use App\Repository\StudentGraduatedRepository;
use App\Repository\StudentPromotionRepository;
use App\Repository\StudentRepositoryInterface;
use App\Repository\SubjectRepositoryInterface;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\LectuersRepositoryInterface;
use App\Repository\QuestionRepositoryInterface;
use App\Repository\AttendanceRepositoryInterface;
use App\Repository\ProcessingRepositoryInterface;
use App\Repository\FeeInvoicesRepositoryInterface;
use App\Repository\StudentGraduatedRepositoryInterface;
use App\Repository\StudentPromotionRepositoryInterface;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(StudentPromotionRepositoryInterface::class, StudentPromotionRepository::class);
        $this->app->bind(StudentGraduatedRepositoryInterface::class, StudentGraduatedRepository::class);
        $this->app->bind(FeesRepositoryInterface::class, FeesRepository::class);
        $this->app->bind(FeeInvoicesRepositoryInterface::class, FeeInvoicesRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->bind(ProcessingRepositoryInterface::class, ProcessingRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(ExamRepositoryInterface::class, ExamRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(LectuersRepositoryInterface::class, LectuersRepository::class);
        $this->app->bind(LibraryRepositoryInterface::class, LibraryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
