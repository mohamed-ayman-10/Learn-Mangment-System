<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeacherController extends Controller
{

    public $teacher;

    public function __construct(TeacherRepositoryInterface $teacher)
    {
        $this->teacher = $teacher;
    }


    public function index()
    {
        $teachers = $this->teacher->getAllTeachers();
        return view('dashboard.Teachers.teachers', compact('teachers'));
    }


    public function create()
    {
        $specializations = $this->teacher->getAllSpecializations();
        $genders = $this->teacher->getAllGenders();
        return view('dashboard.Teachers.create', compact('specializations', 'genders'));
    }


    public function store(TeacherRequest $request)
    {
        return $this->teacher->storeTeacher($request);
    }


    public function show(Teacher $teacher)
    {
        //
    }


    public function edit($id)
    {
        $teacher = $this->teacher->editTeacher($id);
        $specializations = $this->teacher->getAllSpecializations();
        $genders = $this->teacher->getAllGenders();
        return view('dashboard.Teachers.edite', compact('teacher', 'specializations', 'genders'));
    }


    public function update(TeacherRequest $request, $id)
    {
        return $this->teacher->updateTeacher($request, $id);
    }


    public function destroy(Teacher $teacher)
    {
        return $this->teacher->deleteTeacher($teacher);
    }
}
