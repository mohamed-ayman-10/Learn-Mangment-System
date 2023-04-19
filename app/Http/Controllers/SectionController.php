<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionsRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades_sections = Grade::with('sections')->get();
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        return view('dashboard.sections.sections', compact('grades_sections', 'grades', 'classrooms', 'teachers'));
    }

    public function getclass($id)
    {
        $classes = Classroom::where('grade_id', $id)->pluck('class_name', 'id');
        return $classes;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionsRequest $sectionsRequest)
    {

        if (Section::where('section_name->ar', $sectionsRequest->name_ar)->orWhere('section_name->en', $sectionsRequest->name_en)->exists()) {
            return back()->withErrors(__('validation.exists_trans'));
        }

        try {
            $section = new Section;
            $section->section_name = [
                'ar' => $sectionsRequest->section_name_ar,
                'en' => $sectionsRequest->section_name_en
            ];
            $section->status = 1;
            $section->grade_id = $sectionsRequest->grade_id;
            $section->classroom_id = $sectionsRequest->class_id;
            $section->save();
            $section->teachers()->attach($sectionsRequest->teacher_id);

            toastr()->success(__('messages.success'));

            return redirect()->route('sections.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionsRequest $request, Section $section)
    {

        try {
            $section->update([
                'section_name' => [
                    'ar' => $request->section_name_ar,
                    'en' => $request->section_name_en,
                ],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->class_id,
                'status' => $request->status ? 1 : 2,
            ]);
            if ($request->teacher_id) {
                $section->teachers()->sync($request->teacher_id);
            } else {
                $section->teachers()->sync(array());
            }
            toastr()->success(__('messages.success'));

            return redirect()->route('sections.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        Section::destroy($section->id);
        toastr()->success(__('messages.success'));

        return redirect()->route('sections.index');
    }
}
