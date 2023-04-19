<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAllTeachers()
    {
        return Teacher::all();
    }

    public function getAllSpecializations()
    {
        return Specialization::all();
    }

    public function getAllGenders()
    {
        return Gender::all();
    }

    public function storeTeacher($request)
    {
        try {

            $teacher = new Teacher;

            $teacher->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $teacher->address = [
                'ar' => $request->address_ar,
                'en' => $request->address_en,
            ];
            $teacher->email = $request->email;
            $teacher->password = bcrypt($request->password);
            $teacher->joining_date = $request->date;
            $teacher->specialization_id = $request->special_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->save();

            toastr()->success(__('messages.success'));

            return redirect()->route('teachers.create');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function editTeacher($id)
    {
        return Teacher::findorfail($id);
    }

    public function updateTeacher($request, $id)
    {

        try {
            $teacher = Teacher::findorfail($id);

            $teacher->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $teacher->address = [
                'ar' => $request->address_ar,
                'en' => $request->address_en,
            ];
            $teacher->email = $request->email;
            if ($request->password) {
                $teacher->password = bcrypt($request->password);
            }
            $teacher->joining_date = $request->date;
            $teacher->specialization_id = $request->special_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->save();

            toastr()->success(__('messages.update'));

            return redirect()->route('teachers.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function deleteTeacher($teacher)
    {
        Teacher::destroy($teacher->id);
        toastr()->success(__('messages.delete'));
        return redirect()->route('teachers.index');
    }
}
