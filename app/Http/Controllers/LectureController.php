<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Repository\LectuersRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LectureController extends Controller
{

    public  $lecture;

    public function __construct(LectuersRepositoryInterface $lecture) {
        $this->lecture = $lecture;
    }

    public function index()
    {
        return $this->lecture->index();
    }

    public function create()
    {
        return $this->lecture->create();
    }

    public function store(Request $request)
    {
        return $this->lecture->store($request);
    }

    public function show(Lecture $lecture)
    {
        //
    }

    public function edit(Lecture $lecture)
    {
        return $this->lecture->edit($lecture);
    }

    public function update(Request $request, Lecture $lecture)
    {
        return $this->lecture->update($request, $lecture);
    }

    public function destroy(Lecture $lecture)
    {
        return $this->lecture->destroy($lecture);
    }
}
