<?php

namespace App\Http\Controllers\Dashbord\Teacher;

use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $ids = Teacher::findOrFail(Auth::user()->id)->sections()->pluck('section_id');
        $students_id = Student::whereIn('section_id', $ids)->count();
        $sections_id = $ids->count();

        return view('dashboard.Teachers.dashboard.dashboard', compact('sections_id', 'students_id'));
    }

    // Students
    public function student()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', Auth::user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('dashboard.Teachers.dashboard.students', compact('students'));
    }

    //Sections
    public function section()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', Auth::user()->id)->pluck('section_id');
        $sections = Section::whereIn('id', $ids)->get();
        return view('dashboard.Teachers.dashboard.sections', compact('sections'));
    }
}
