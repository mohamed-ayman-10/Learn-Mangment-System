<?php

namespace App\Repository;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Support\Facades\DB;



class AttendanceRepository implements AttendanceRepositoryInterface
{
    public function index()
    {
        $grades_sections = Grade::with('sections')->get();
        return view('dashboard.Attendances.attendances', compact('grades_sections'));
    }

    public function create($id)
    {
        $students = Student::with('attendances')->where('section_id', $id)->get();
        return view('dashboard.Attendances.index', compact('students'));
    }

    public function store($request)
    {
        try {

            $date = date('y-m-d');

            foreach ($request->attendance as $student_id => $attendance) {

                if ($attendance == 1) {
                    $status = true;
                } elseif ($attendance == 0) {
                    $status = false;
                }

                Attendance::create([
                    'date' => $date,
                    'status' => $status,
                    'student_id' => $student_id,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 1,

                ]);
            }

            toastr()->success(__('messages.success'));
            // return redirect()->route('attendances.index');
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($attendance)
    {
    }

    public function update($request, $attendance)
    {
        DB::beginTransaction();
        try {



            DB::commit();
            toastr()->success(__('messages.update'));
            return redirect()->route('payments.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($attendance)
    {


        toastr()->success(__('messages.delete'));
        return redirect()->route('payments.index');
    }
}
