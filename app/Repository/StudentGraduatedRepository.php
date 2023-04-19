<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{
    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('dashboard.Students.Graduated.index', compact('students'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('dashboard.Students.Graduated.create', compact('grades'));
    }

    public function softDelete($request)
    {
        try {
            $students = Student::where('grade_id', $request->grade)
                ->where('classroom_id', $request->classroom)
                ->where('section_id', $request->section)->get();

            if (count($students) < 1) {
                return back()->withErrors(['error' => trans('students.notfound')]);
            }

            foreach ($students as $student) {
                $ids = explode(',', $student->id);
                Student::whereIn('id', $ids)->delete();
            }
            toastr()->success(__('messages.success'));
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function restore($request)
    {
        try {
            Student::onlyTrashed()->where('id', $request->id)->first()->restore();
            toastr()->success(__('messages.success'));
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete($request)
    {
        try {
            Student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
            toastr()->success(__('messages.delete'));
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
