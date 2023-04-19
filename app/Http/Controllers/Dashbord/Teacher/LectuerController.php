<?php

namespace App\Http\Controllers\Dashbord\Teacher;

use App\Models\Grade;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LectuerController extends Controller
{
    public function index()
    {

        $lectures = Lecture::where('created_by', Auth::user()->email)->get();
        return view('dashboard.Teachers.dashboard.Lectures.index', compact('lectures'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('dashboard.Teachers.dashboard.Lectures.create', compact('grades'));
    }

    public function store(Request $request)
    {
        try {
            Lecture::create([
                'grade_id' => $request->grade,
                'classroom_id' => $request->classroom,
                'section_id' => $request->section,
                'created_by' => Auth::user()->email,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->name,
                'start_at' => $request->start,
                'duration' => $request->num,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);

            toastr()->success(__('messages.success'));
            return redirect()->route('lectuer.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $lecture = Lecture::findOrFail($id);
        $grades = Grade::all();
        return view('dashboard.Teachers.dashboard.Lectures.edit', compact('grades', 'lecture'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $lecture = Lecture::findOrFail($id);
            $lecture->grade_id = $request->grade;
            $lecture->classroom_id = $request->classroom;
            $lecture->section_id = $request->section;
            $lecture->created_by = Auth::user()->email;
            $lecture->meeting_id = $request->meeting_id;
            $lecture->topic = $request->name;
            $lecture->start_at = $request->start;
            $lecture->duration = $request->num;
            $lecture->password = $request->password;
            $lecture->start_url = $request->start_url;
            $lecture->join_url = $request->join_url;
            $lecture->save();


            toastr()->success(__('messages.update'));
            return redirect()->route('lectuer.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {

        Lecture::destroy($id);

        toastr()->success(__('messages.delete'));
        return redirect()->route('lectuer.index');
    }
}
