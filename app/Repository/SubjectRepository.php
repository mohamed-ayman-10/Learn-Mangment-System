<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;



class SubjectRepository implements SubjectRepositoryInterface
{
    public function index()
    {
        $subjects = Subject::all();
        return view('dashboard.Subjects.index', compact('subjects'));
    }

    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('dashboard.Subjects.create', compact('grades', 'teachers'));
    }

    public function store($request)
    {
        try {

            $subject = new Subject();
            $subject->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $subject->grade_id = $request->grade;
            $subject->classroom_id = $request->classroom;
            $subject->teacher_id = $request->teacher;
            $subject->save();

            toastr()->success(__('messages.success'));
            return redirect()->route('subjects.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($subject)
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        // return $subject->grade_id;
        return view('dashboard.Subjects.edit', compact('grades', 'teachers', 'subject'));
    }

    public function update($request, $subject)
    {
        DB::beginTransaction();
        try {

            $subject->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $subject->grade_id = $request->grade;
            $subject->classroom_id = $request->classroom;
            $subject->teacher_id = $request->teacher;
            $subject->save();

            DB::commit();
            toastr()->success(__('messages.update'));
            return redirect()->route('subjects.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($subject)
    {

        $subject->delete();

        toastr()->success(__('messages.delete'));
        return redirect()->route('subjects.index');
    }
}
