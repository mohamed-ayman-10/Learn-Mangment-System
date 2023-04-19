<?php

namespace App\Http\Controllers\Dashbord\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::where('grade_id', Auth::user()->grade_id)
            ->where('classroom_id', Auth::user()->classroom_id)
            ->where('section_id', Auth::user()->section_id)->get();

        return view('dashboard.Students.Dashboard.Exams.index', compact('exams'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $exam_id)
    {
        $student_id = Auth::user()->id;
        return view('dashboard.Students.Dashboard.Exams.show', compact('student_id', 'exam_id'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
