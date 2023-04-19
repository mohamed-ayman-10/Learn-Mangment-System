<?php

namespace App\Http\Controllers\Dashbord\Teacher;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    // Attendances
    public function attendance()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', Auth::user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('dashboard.Teachers.dashboard.attendances', compact('students'));
    }

    public function store(Request $request)
    {
        try {

            $date = date('y-m-d');
            foreach ($request->attendance as $student_id => $attendance) {
                if ($attendance == 1) {
                    $status = true;
                } elseif ($attendance == 0) {
                    $status = false;
                }

                Attendance::updateOrCreate(['student_id' => $student_id, 'date' => $date], [
                    'date' => $date,
                    'status' => $status,
                    'student_id' => $student_id,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => Auth::user()->id,

                ]);
            }

            toastr()->success(__('messages.success'));
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function report()
    {

        $ids = DB::table('teacher_section')->where('teacher_id', Auth::user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('dashboard.Teachers.dashboard.report', compact('students'));
    }
    public function postReport(Request $request)
    {

        if ($request->from > $request->to) {
            return back()->withErrors(['error' => __('attendances.error')]);
        }

        $ids = DB::table('teacher_section')->where('teacher_id', Auth::user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();

        if ($request->student_id == 0) {
            $attendances = Attendance::whereBetween('date', [$request->from, $request->to])->get();
        } else {
            $attendances = Attendance::whereBetween('date', [$request->from, $request->to])->where('student_id', $request->student_id)->get();
        }

        return view('dashboard.Teachers.dashboard.report', compact('students', 'attendances'));
    }
}
