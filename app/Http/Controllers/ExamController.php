<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Repository\ExamRepositoryInterface;

class ExamController extends Controller
{

    public  $exam;

    public function __construct(ExamRepositoryInterface $exam)
    {
        $this->exam = $exam;
    }

    public function index()
    {
        return $this->exam->index();
    }

    public function create()
    {
        return $this->exam->create();
    }

    public function store(Request $request)
    {
        return $this->exam->store($request);
    }

    public function show(Exam $exam)
    {
        //
    }

    public function edit(Exam $exam)
    {
        return $this->exam->edit($exam);
    }

    public function update(Request $request, Exam $exam)
    {
        return $this->exam->update($request, $exam);
    }

    public function destroy(Exam $exam)
    {
        return $this->exam->destroy($exam);
    }
}
