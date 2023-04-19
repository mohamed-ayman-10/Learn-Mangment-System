<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubjectController extends Controller
{

    public $subject;

    public function __construct(SubjectRepositoryInterface $subject)
    {
        $this->subject = $subject;
    }

    public function index()
    {
        return $this->subject->index();
    }

    public function create()
    {
        return $this->subject->create();
    }

    public function store(SubjectRequest $request)
    {
        return $this->subject->store($request);
    }

    public function show($id)
    {
    }


    public function edit(Subject $subject)
    {
        return $this->subject->edit($subject);
    }


    public function update(SubjectRequest $request, Subject $subject)
    {
        return $this->subject->update($request, $subject);
    }

    public function destroy(Subject $subject)
    {
        return $this->subject->destroy($subject);
    }
}
