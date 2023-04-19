<?php

namespace App\Repository;

use App\Models\Fees;
use App\Models\FeeType;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class FeesRepository implements FeesRepositoryInterface
{
    public function index()
    {
        $fees = Fees::all();
        return view('dashboard.Fees.fees', compact('fees'));
    }

    public function create()
    {
        $feeTypes = FeeType::all();
        $grades = Grade::all();
        return view('dashboard.Fees.create', compact('grades', 'feeTypes'));
    }

    public function store($request)
    {
        try {
            $fees = new Fees();

            $fees->title = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $fees->amount = $request->amount;
            $fees->feetype_id = $request->type;
            $fees->year = $request->year;
            $fees->grade_id = $request->grade;
            $fees->classroom_id = $request->classroom;
            if ($request->desc) {
                $fees->description = $request->desc;
            }
            $fees->save();
            toastr()->success(__('messages.success'));
            return redirect()->route('fees.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $fee = Fees::findOrFail($id);
        $feeTypes = FeeType::all();
        $grades = Grade::all();
        return view('dashboard.Fees.update', compact('fee', 'grades', 'feeTypes'));
    }

    public function update($request, $id)
    {
        try {
            $fees = Fees::findOrFail($id);

            $fees->title = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $fees->amount = $request->amount;
            $fees->year = $request->year;
            $fees->grade_id = $request->grade;
            $fees->classroom_id = $request->classroom;
            $fees->feetype_id = $request->type;
            $fees->description = $request->desc;
            $fees->save();
            toastr()->success(__('messages.success'));
            return redirect()->route('fees.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        Fees::destroy($id);
        toastr()->success(__('messages.delete'));
        return redirect()->route('fees.index');
    }
}
