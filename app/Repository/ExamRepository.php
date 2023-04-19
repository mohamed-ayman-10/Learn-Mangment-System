<?php

namespace App\Repository;

use view;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;



class ExamRepository implements ExamRepositoryInterface
{
    public function index()
    {
        $exams = Exam::all();
        return view('dashboard.Exam.index', compact('exams'));
    }

    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('dashboard.Exam.create', compact('grades', 'teachers'));
    }

    public function store($request)
    {
        try {

            $exam = new Exam();
            $exam->name = [
                "ar" => $request->name_ar,
                "en" => $request->name_en,
            ];
            $exam->year = $request->year;
            $exam->teacher_id = $request->teacher;
            $exam->grade_id = $request->grade;
            $exam->classroom_id = $request->classroom;
            $exam->section_id = $request->section;
            $exam->save();

            toastr()->success(__('messages.success'));
            return redirect()->route('exams.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($exam)
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('dashboard.Exam.edit', compact('exam', 'grades', 'teachers'));
    }

    public function update($request, $exam)
    {
        DB::beginTransaction();
        try {

            $exam->name = [
                "ar" => $request->name_ar,
                "en" => $request->name_en,
            ];
            $exam->year = $request->year;
            $exam->teacher_id = $request->teacher;
            $exam->grade_id = $request->grade;
            $exam->classroom_id = $request->classroom;
            $exam->section_id = $request->section;
            $exam->save();

            DB::commit();
            toastr()->success(__('messages.update'));
            return redirect()->route('exams.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($exam)
    {

        $exam->delete();

        toastr()->success(__('messages.delete'));
        return redirect()->route('exams.index');
    }
}
