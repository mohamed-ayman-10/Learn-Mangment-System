<?php

namespace App\Http\Controllers\Dashbord\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class StudentProfileController extends Controller
{
    public function index()
    {
        $student = Student::findOrFail(Auth::user()->id);
        return view('dashboard.Students.Dashboard.editprofile', compact('student'));
    }

    public function update(Request $request, string $id)
    {

        try {

            $student = Student::findOrFail($id);
            $student->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $student->email = $request->email;
            if ($request->password) {
                $student->password = bcrypt($request->password);
            }
            $student->save();

            toastr()->success(__('messages.update'));
            return redirect('student/dashboard/profile');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
