<?php

namespace App\Repository;

use App\Models\Blood;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Guardian;
use App\Models\Image;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Specialization;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface
{
    public function showStudent($id)
    {
        return $student = Student::findorfail($id);
    }

    public function getAllStudents()
    {
        return Student::all();
    }

    public function getAllGrades()
    {
        return Grade::all();
    }

    public function getAllGuardians()
    {
        return Guardian::all();
    }

    public function getAllGenders()
    {
        return Gender::all();
    }

    public function getAllNationalitie()
    {
        return Nationalitie::all();
    }

    public function getAllBlood()
    {
        return Blood::all();
    }

    public function getClassroom($id)
    {
        return Classroom::where('grade_id', $id)->pluck('class_name', 'id');
    }

    public function getSection($id)
    {
        return Section::where('classroom_id', $id)->pluck('section_name', 'id');
    }

    public function storeStudent($request)
    {
        DB::beginTransaction();

        try {

            $student = new Student();

            $student->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $student->email = $request->email;
            $student->password = bcrypt($request->password);
            $student->birth_day = $request->date;
            $student->academic_year = $request->year;
            $student->nationalitie_id = $request->nationalitie;
            $student->gender_id = $request->gender;
            $student->blood_id = $request->blood;
            $student->grade_id = $request->grade;
            $student->classroom_id = $request->classroom;
            $student->section_id = $request->section;
            $student->guardian_id = $request->guardian;
            $student->save();

            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $image) {
                    $name = $image->getClientOriginalName();
                    $image->storeAs('attachments/students/' . $student->name, $image->getClientOriginalName(), 'upload_attachments');

                    $images = new Image();
                    $images->file_name = $name;
                    $images->imageable_id = $student->id;
                    // $images->imageable_type = "App\Models\Student";
                    $images->imageable_type = Student::class;
                    $images->save();
                }
            }

            DB::commit();

            toastr()->success(__('messages.success'));

            return redirect()->route('students.create');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updateStudents($request)
    {
        try {
            $student = Student::findorfail($request->id);
            $student->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $student->email = $request->email;
            $student->birth_day = $request->date;
            $student->nationalitie_id = $request->nationalitie;
            $student->gender_id = $request->gender;
            $student->blood_id = $request->blood;
            $student->grade_id = $request->grade;
            $student->classroom_id = $request->classroom;
            $student->section_id = $request->section;
            $student->guardian_id = $request->guardian;
            $student->academic_year = $request->year;
            if ($request->password) {
                $student->password = bcrypt($request->password);
            }

            $student->save();

            toastr()->success(__('messages.update'));
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function uploadAtachmentStudents($request)
    {
        foreach ($request->file('images') as $image) {
            $image->storeAs('attachments/students/' . $request->student_name, $image->getClientOriginalName(), 'upload_attachments');

            $images = new Image();
            $images->file_name = $image->getClientOriginalName();
            $images->imageable_id = $request->student_id;
            $images->imageable_type = Student::class;
            $images->save();
        }
        toastr()->success(__('messages.success'));
        return redirect('students/' . $request->student_id);
    }

    public function downloadAtachmentStudents($student_name, $file_name)
    {
        return response()->download(public_path('attachments/students/' . $student_name . '/' . $file_name));
        toastr()->success(__('messages.success'));
        return back();
    }

    public function deleteAtachmentStudents($request)
    {
        Storage::disk('upload_attachments')->delete('attachments/students/' . $request->student_name . '/' . $request->file_name);

        Image::destroy($request->file_id);
        toastr()->success(__('messages.delete'));
        return back();
    }

    public function deleteStudents($student)
    {
        Student::destroy($student->id);
        toastr()->success(__('messages.delete'));
        return redirect()->route('students.index');
    }
}
