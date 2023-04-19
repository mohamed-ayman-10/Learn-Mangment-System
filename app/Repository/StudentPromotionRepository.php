<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{
    public function index()
    {
        try {
            $grades = Grade::all();
            return view('dashboard.Students.Promotions.index', compact('grades'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $students = Student::where('grade_id', $request->grade)
                ->where('classroom_id', $request->classroom)
                ->where('section_id', $request->section)->get()
                ->where('academic_year', $request->old_year);

            // return count($students);

            if (count($students) == 0) {
                return redirect()->back()->withErrors(['error_promotions' => __('students.notfound')]);
            }

            foreach ($students as $student) {
                $ids = explode(',', $student->id);
                Student::whereIn('id', $ids)->update([
                    'grade_id' => $request->new_grade,
                    'classroom_id' => $request->new_classroom,
                    'section_id' => $request->new_section,
                    'academic_year' => $request->new_year,
                ]);


                Promotion::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade' => $request->grade,
                    'from_classroom' => $request->classroom,
                    'from_section' => $request->section,
                    'to_grade' => $request->new_grade,
                    'to_classroom' => $request->new_classroom,
                    'to_section' => $request->new_section,
                    'old_academic_year' => $request->old_year,
                    'new_academic_year' => $request->new_year,
                ]);
            }
            DB::commit();
            toastr()->success(__('messages.success'));
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function management()
    {
        $promotions = Promotion::all();
        return view('dashboard.Students.Promotions.mangement', compact('promotions'));
    }

    public function destroy($request)
    {
        DB::beginTransaction();
        try {

            if ($request->id == 'all') {
                $promotions = Promotion::all();
                foreach ($promotions as $promotion) {
                    $ids = explode(',', $promotion->student_id);
                    Student::whereIn('id', $ids)->update([
                        'grade_id' => $promotion->from_grade,
                        'classroom_id' => $promotion->from_classroom,
                        'section_id' => $promotion->from_section,
                        'academic_year' => $promotion->old_academic_year,
                    ]);
                    Promotion::truncate();
                }
            } else {
                $promotion = Promotion::findOrFail($request->id);
                // return $promotion;
                Student::where('id', $promotion->student->id)->update([
                    'grade_id' => $promotion->from_grade,
                    'classroom_id' => $promotion->from_classroom,
                    'section_id' => $promotion->from_section,
                    'academic_year' => $promotion->old_academic_year,
                ]);

                Promotion::destroy($request->id);
            }

            DB::commit();
            toastr()->success(__('messages.delete'));

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
