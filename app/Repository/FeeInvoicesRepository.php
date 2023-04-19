<?php

namespace App\Repository;

use App\Models\Fee_invoice;
use App\Models\Fees;
use App\Models\FeeType;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface
{
    public function index()
    {
        $feeInvoices = Fee_invoice::all();
        return view('dashboard.FeeInvoices.index', compact('feeInvoices'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $fees = Fees::where('classroom_id', $student->classroom_id)->get();
        $feeTypes = FeeType::all();
        return view('dashboard.FeeInvoices.create', compact('student', 'fees', 'feeTypes'));
    }

    public function get_amount($id, $classroom_id)
    {
        return Fees::where('classroom_id', $classroom_id)->where('id', $id)->pluck('amount');
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {

            $t = Fee_invoice::where('student_id', $request->student_id)->where('fees_id', $request->type)->get()->count();
            if ($t != 0) {
                return back()->withErrors(['error' => __('validation.unique')]);
            }

            $feeInvoices = new Fee_invoice();
            $feeInvoices->date = date('y-m-d');
            $feeInvoices->amount = $request->amount;
            $feeInvoices->description = $request->desc;
            $feeInvoices->student_id = $request->student_id;
            $feeInvoices->grade_id = $request->grade_id;
            $feeInvoices->classroom_id = $request->classroom_id;
            $feeInvoices->fees_id = $request->type;
            $feeInvoices->save();

            $studentAccount = new StudentAccount();
            $studentAccount->debit = $request->amount;
            $studentAccount->credit = 0.00;
            $studentAccount->description = $request->desc;
            $studentAccount->student_id = $request->student_id;
            $studentAccount->grade_id = $request->grade_id;
            $studentAccount->classroom_id = $request->classroom_id;
            $studentAccount->save();


            DB::commit();
            toastr()->success(__('messages.success'));
            return redirect()->route('fee_invoices.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $feeInvoices = Fee_invoice::where('id', $id)->get();
            $student = Student::findOrFail($feeInvoices[0]->student_id);
            $fees = Fees::where('classroom_id', $student->classroom_id)->get();
            // return $student;
            return view('dashboard.FeeInvoices.edit', compact('feeInvoices', 'student', 'fees'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {

            if ($request->amount != $request->old_amount) {
                $t = Fee_invoice::where('student_id', $request->student_id)->where('fees_id', $request->type)->get()->count();
                if ($t != 0) {
                    return back()->withErrors(['error' => __('validation.unique')]);
                }
            }

            Fee_invoice::findOrFail($request->id)->update([
                'amount' => $request->amount,
                'description' => $request->desc,
                'fees_id' => $request->type,
            ]);

            StudentAccount::where('student_id', $request->student_id)
                ->where('debit', $request->old_amount)
                ->update([
                    'debit' => $request->amount,
                    'description' => $request->desc
                ]);


            DB::commit();
            toastr()->success(__('messages.update'));
            return redirect()->route('fee_invoices.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        DB::beginTransaction();

        try {
            Fee_invoice::findOrFail($request->fee_invoices_id)->delete();

            StudentAccount::where('student_id', $request->student_id)
                ->where('debit', $request->amount)
                ->delete();

            DB::commit();
            toastr()->success(__('messages.delete'));
            return redirect()->route('fee_invoices.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
