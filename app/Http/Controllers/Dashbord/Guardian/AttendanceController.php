<?php

namespace App\Http\Controllers\Dashbord\Guardian;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function report()
    {

        $students = Student::where('guardian_id', Auth::user()->id)->get();
        return view('dashboard.guardians.Dashboard.Attendance.attendance', compact('students'));
    }
    public function postReport(Request $request)
    {

        if ($request->from > $request->to) {
            return back()->withErrors(['error' => __('attendances.error')]);
        }

        $students = Student::where('guardian_id', Auth::user()->id)->get();

        if ($request->student_id == 0) {
            $attendances = Attendance::whereBetween('date', [$request->from, $request->to])->get();
        } else {
            $attendances = Attendance::whereBetween('date', [$request->from, $request->to])->where('student_id', $request->student_id)->get();
        }

        return view('dashboard.Teachers.dashboard.report', compact('students', 'attendances'));
    }
}
