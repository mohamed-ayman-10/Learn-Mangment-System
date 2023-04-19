<?php

namespace App\Repository;

use App\Http\Traits\meetingZoom;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Lecture;
use App\Models\Library;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use MacsiDigital\Zoom\Facades\Zoom;
use view;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LibraryRepository implements LibraryRepositoryInterface
{
    use meetingZoom;

    public function index()
    {
        $libraries = Library::all();
        return view('dashboard.Library.index', compact('libraries'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('dashboard.Library.create', compact('grades'));
    }

    public function store($request)
    {
        try {

            // return $request;

            $library = new Library();
            $library->title = $request->title;
            $library->grade_id = $request->grade;
            $library->classroom_id = $request->classroom;
            $library->section_id = $request->section;
            $library->teacher_id = Auth::user()->id;

            if ($request->hasfile('file')) {
                $file = $request->file('file');
                $name = $file->getClientOriginalName();
                $file->storeAs('attachments/library/', $file->getClientOriginalName(), 'upload_attachments');
                $library->file_name = $name;
            }
            $library->save();

            toastr()->success(__('messages.success'));
            return redirect()->route('libraries.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($library)
    {
        $grades = Grade::all();

        return view('dashboard.Library.edit', compact('grades', 'library'));
    }

    public function update($request, $library)
    {
        DB::beginTransaction();
        try {

            $library->title = $request->title;
            $library->grade_id = $request->grade;
            $library->classroom_id = $request->classroom;
            $library->section_id = $request->section;

            if ($request->hasfile('file')) {
                Storage::disk('upload_attachments')->delete('attachments/library/' . $library->file_name);
                $file = $request->file('file');
                $name = $file->getClientOriginalName();
                $file->storeAs('attachments/library/', $file->getClientOriginalName(), 'upload_attachments');
                $library->file_name = $name;
            }

            $library->save();


            DB::commit();
            toastr()->success(__('messages.update'));
            return redirect()->route('libraries.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($library)
    {

        $library->delete();

        Storage::disk('upload_attachments')->delete('attachments/library/' . $library->file_name);

        toastr()->success(__('messages.delete'));
        return redirect()->route('libraries.index');
    }

    public function download($library)
    {
        return response()->download(public_path('attachments/library/' . $library->file_name));
    }
}
