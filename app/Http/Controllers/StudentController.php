<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Repository\StudentRepositoryInterface;

class StudentController extends Controller
{

    public $student;

    public function __construct(StudentRepositoryInterface $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        $students = $this->student->getAllStudents();
        return view('dashboard.Students.students', compact('students'));
    }




    public function create()
    {
        $grades = $this->student->getAllGrades();
        $genders = $this->student->getAllGenders();
        $guardians = $this->student->getAllGuardians();
        $nationalities = $this->student->getAllNationalitie();
        $bloods = $this->student->getAllBlood();
        return view('dashboard.Students.create', compact('grades', 'genders', 'guardians', 'nationalities', 'bloods'));
    }


    public function store(StudentRequest $request)
    {
        // if ($request->images) {
        //     return "ok";
        // }else {
        //     return "no";
        // }
        // return $request->images[0];
        return $this->student->storeStudent($request);
    }

    public function get_classroom($id)
    {
        return $this->student->getClassroom($id);
    }

    public function get_section($id)
    {
        return $this->student->getSection($id);
    }


    public function show($id)
    {
        $student = $this->student->showStudent($id);
        return view('dashboard.Students.show', compact('student'));
    }


    public function edit(Student $student)
    {
        $grades = $this->student->getAllGrades();
        $genders = $this->student->getAllGenders();
        $guardians = $this->student->getAllGuardians();
        $nationalities = $this->student->getAllNationalitie();
        $bloods = $this->student->getAllBlood();
        return view('dashboard.Students.edit', compact('grades', 'genders', 'guardians', 'nationalities', 'bloods', 'student'));
    }


    public function update(StudentRequest $request)
    {
        if ($request->password) {
            $request->validate([
                'password' => 'required|min:6|max:15'
            ], [
                'password.required' => __('validation.required'),
                'password.min' => __('validation.min'),
                'password.max' => __('validation.max'),
            ]);
        }
        return $this->student->updateStudents($request);
    }

    public function upload(Request $request)
    {
        return $this->student->uploadAtachmentStudents($request);
    }

    public function download($student_name, $file_name)
    {
        return $this->student->downloadAtachmentStudents($student_name, $file_name);
    }

    public function delete(Request $request)
    {
        return $this->student->deleteAtachmentStudents($request);
    }


    public function destroy(Student $student)
    {
        return $this->student->deleteStudents($student);
    }
}
