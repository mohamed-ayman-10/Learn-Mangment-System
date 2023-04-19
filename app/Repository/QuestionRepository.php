<?php

namespace App\Repository;

use App\Models\Exam;
use App\Models\Question;
use view;
use Illuminate\Support\Facades\DB;



class QuestionRepository implements QuestionRepositoryInterface
{
    public function index()
    {
        $questions = Question::all();
        return view('dashboard.Questions.index', compact('questions'));
    }

    public function create()
    {
        $exams = Exam::all();
        return view('dashboard.Questions.create', compact('exams'));
    }

    public function store($request)
    {
        try {
            $question = new Question();
            $question->title = $request->name;
            $question->answers = $request->answer;
            $question->right_answer = $request->correct;
            $question->score = $request->score;
            $question->exam_id = $request->exam;
            $question->save();

            toastr()->success(__('messages.success'));
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($question)
    {
        $exams = Exam::all();
        return view('dashboard.Questions.edit', compact('exams', 'question'));
    }

    public function update($request, $question)
    {
        try {
            $question->title = $request->name;
            $question->answers = $request->answer;
            $question->right_answer = $request->correct;
            $question->score = $request->score;
            $question->exam_id = $request->exam;
            $question->save();

            toastr()->success(__('messages.update'));
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($question)
    {

        $question->delete();

        toastr()->success(__('messages.delete'));
        return redirect()->route('questions.index');
    }
}
