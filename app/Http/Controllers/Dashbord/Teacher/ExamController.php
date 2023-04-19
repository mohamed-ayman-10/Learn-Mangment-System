<?php

namespace App\Http\Controllers\Dashbord\Teacher;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{

    public function exams()
    {
        $exams = Exam::where('teacher_id', Auth::user()->id)->get();
        return view('dashboard.Teachers.dashboard.exams.exams', compact('exams'));
    }

    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        $subjects = Subject::where('teacher_id', Auth::user()->id)->get();
        return view('dashboard.Teachers.dashboard.exams.create', compact('grades', 'teachers', 'subjects'));
    }

    public function store(Request $request)
    {
        try {

            $exam = new Exam();
            $exam->name = [
                "ar" => $request->name_ar,
                "en" => $request->name_en,
            ];
            $exam->year = $request->year;
            $exam->teacher_id = Auth::user()->id;
            $exam->grade_id = $request->grade;
            $exam->classroom_id = $request->classroom;
            $exam->section_id = $request->section;
            $exam->subject_id = $request->subject;
            $exam->save();

            toastr()->success(__('messages.success'));
            return redirect()->route('teacher.dashboard.exams');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $grades = Grade::all();
        $teachers = Teacher::all();
        $subjects = Subject::where('teacher_id', Auth::user()->id)->get();
        return view('dashboard.Teachers.dashboard.exams.edit', compact('exam', 'grades', 'teachers', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        try {

            $exam = Exam::findOrFail($id);

            $exam->name = [
                "ar" => $request->name_ar,
                "en" => $request->name_en,
            ];
            $exam->year = $request->year;
            $exam->teacher_id = Auth::user()->id;
            $exam->grade_id = $request->grade;
            $exam->classroom_id = $request->classroom;
            $exam->section_id = $request->section;
            $exam->subject_id = $request->subject;
            $exam->save();

            toastr()->success(__('messages.update'));
            return redirect()->route('teacher.dashboard.exams');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        Exam::destroy($id);

        toastr()->success(__('messages.delete'));
        return redirect()->route('teacher.dashboard.exams');
    }

    public function show($id)
    {
        $questions = Question::where('exam_id', $id)->get();
        $exam_id = $id;
        return view('dashboard.Teachers.dashboard.Questions.index', compact('questions', 'exam_id'));
    }

    public function studentExam($exam_id)
    {
        $degrees = Degree::where('exam_id', $exam_id)->get();
        return view('dashboard.Teachers.dashboard.exams.complet-exams', compact('degrees'));
    }

    public function destroyDegree($id)
    {
        Degree::destroy($id);

        toastr()->success(__('messages.update'));
        return redirect()->route('teacher.dashboard.exams.exam', $id);
    }
}
