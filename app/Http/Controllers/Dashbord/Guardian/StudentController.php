<?php

namespace App\Http\Controllers\Dashbord\Guardian;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::where('guardian_id', Auth::user()->id)->get();
        return view('dashboard.guardians.Dashboard.Students.students', compact('students'));
    }

    public function score($id)
    {
        $student = Student::with('degrees')->where('guardian_id', Auth::user()->id)->where('id', $id)->first();
        $degrees = $student->degrees;
        return view('dashboard.guardians.Dashboard.Students.degree', compact('degrees'));
    }
}
