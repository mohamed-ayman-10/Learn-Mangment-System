<?php

namespace App\Http\Controllers\Dashbord\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TeacherProfileController extends Controller
{
    public function index()
    {
        $teacher = Teacher::findOrFail(Auth::user()->id);
        return view('dashboard.Teachers.dashboard.editprofile', compact('teacher'));
    }

    public function update(Request $request, string $id)
    {


        try {

            $teacher = Teacher::findOrFail($id);
            $teacher->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $teacher->email = $request->email;

            if ($request->password) {
                $teacher->password = bcrypt($request->password);
            }
            $teacher->save();

            toastr()->success(__('messages.update'));
            return redirect('teacher/dashboard/profile');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
