<?php

namespace App\Repository;

use App\Models\Processing;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;



class ProcessingRepository implements ProcessingRepositoryInterface
{
    public function index()
    {
        $processings = Processing::all();
        return view('dashboard.Processings.processings', compact('processings'));
    }

    public function create($id)
    {
        $student = Student::findOrFail($id);
        if ($student->studentAccount->count() < 1) {
            return back();
        }
        return view('dashboard.Processings.create', compact('student'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {

            $processing = new Processing();
            $processing->date = date('y-m-d');
            $processing->amount = $request->amount;
            $processing->description = $request->desc;
            $processing->student_id = $request->student_id;
            $processing->save();

            $studentAccount = new StudentAccount();
            $studentAccount->credit = $request->amount;
            $studentAccount->description = $request->desc;
            $studentAccount->student_id = $request->student_id;
            $studentAccount->classroom_id = $request->classroom_id;
            $studentAccount->grade_id = $request->grade_id;
            $studentAccount->processing_id = $processing->id;
            $studentAccount->save();


            DB::commit();
            toastr()->success(__('messages.success'));
            return redirect()->route('processings.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($processing)
    {
        return view('dashboard.Processings.edit', compact('processing'));
    }

    public function update($request, $processing)
    {
        DB::beginTransaction();
        try {

            $processing->date = date('y-m-d');
            $processing->amount = $request->amount;
            $processing->description = $request->desc;
            $processing->save();

            $studentAccount = StudentAccount::where('processing_id', $processing->id)->first();
            $studentAccount->credit = $request->amount;
            $studentAccount->description = $request->desc;
            $studentAccount->save();

            DB::commit();
            toastr()->success(__('messages.update'));
            return redirect()->route('processings.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($processing)
    {

        $processing->delete();

        toastr()->success(__('messages.delete'));
        return redirect()->route('processings.index');
    }
}
