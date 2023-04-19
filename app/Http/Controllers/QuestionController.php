<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Repository\QuestionRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{

    public $question;

    public function __construct(QuestionRepositoryInterface $question)
    {
        $this->question = $question;
    }

    public function index()
    {
        return $this->question->index();
    }

    public function create()
    {
        return $this->question->create();
    }

    public function store(Request $request)
    {
        return $this->question->store($request);
    }

    public function show(Question $question)
    {
        //
    }

    public function edit(Question $question)
    {
        return $this->question->edit($question);
    }

    public function update(Request $request, Question $question)
    {
        return $this->question->update($request, $question);
    }

    public function destroy(Question $question)
    {
        return $this->question->destroy($question);
    }
}
