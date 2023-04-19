<?php

namespace App\Http\Controllers\dashbord\Teacher;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('dashboard.Teachers.dashboard.Questions.create');
    }

    public function store(Request $request)
    {
        try {
            $exam_id = $request->exam_id;
            $question = new Question();
            $question->title = $request->name;
            $question->answers = $request->answer;
            $question->right_answer = $request->correct;
            $question->score = $request->score;
            $question->exam_id = $request->exam_id;
            $question->save();

            toastr()->success(__('messages.success'));
            return redirect()->route('teacher.dashboard.exams.show', $exam_id);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $exam_id = $id;
        return view('dashboard.Teachers.dashboard.Questions.create', compact('exam_id'));
    }

    public function edit(string $id)
    {
        $question = Question::findOrFail($id);
        return view('dashboard.Teachers.dashboard.Questions.edit', compact('question'));
    }

    public function update(Request $request, string $id)
    {
        $question = Question::findOrFail($id);
        try {
            $question->title = $request->name;
            $question->answers = $request->answer;
            $question->right_answer = $request->correct;
            $question->score = $request->score;
            $question->save();

            toastr()->success(__('messages.update'));
            return redirect()->route('teacher.dashboard.exams.show', $request->exam_id);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(string $id, Request $request)
    {
        Question::destroy($id);

        toastr()->success(__('messages.delete'));
        return redirect()->route('teacher.dashboard.exams.show', $request->exam_id);
    }
}
