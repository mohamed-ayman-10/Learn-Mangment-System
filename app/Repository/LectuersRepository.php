<?php

namespace App\Repository;

use App\Http\Traits\meetingZoom;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Lecture;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use MacsiDigital\Zoom\Facades\Zoom;
use view;
use Illuminate\Support\Facades\DB;


class LectuersRepository implements LectuersRepositoryInterface
{
    use meetingZoom;

    public function index()
    {
        $lectures = Lecture::where('created_by', Auth::user()->email)->get();
        return view('dashboard.Lectures.index', compact('lectures'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('dashboard.Lectures.create', compact('grades'));
    }

    public function store($request)
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
            return redirect()->route('lectures.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($lecture)
    {
        $grades = Grade::all();
        return view('dashboard.Lectures.edit', compact('grades', 'lecture'));
    }

    public function update($request, $lecture)
    {
        try {
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
            return redirect()->route('lectures.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($lecture)
    {

        $lecture->delete();

        toastr()->success(__('messages.delete'));
        return redirect()->route('lectures.index');
    }
}
