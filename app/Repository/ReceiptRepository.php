<?php

namespace App\Repository;

use App\Models\Fees;
use App\Models\FeeType;
use App\Models\FundAccount;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Receipt;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ReceiptRepository implements ReceiptRepositoryInterface
{
    public function index()
    {
        $receipts = Receipt::all();
        return view('dashboard.Receipts.receipts', compact('receipts'));
    }

    public function create($id)
    {
        $student = Student::findOrFail($id);
        return view('dashboard.Receipts.create', compact('student'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {

            // Create Receipt
            $receipt = new Receipt();
            $receipt->date = date('y-m-d');
            $receipt->debit = $request->amount;
            $receipt->student_id = $request->student_id;
            $receipt->description = $request->desc;
            $receipt->save();

            // Create FundAccount
            $fundAccount = new FundAccount();
            $fundAccount->date = date('y-m-d');
            $fundAccount->debit = $request->amount;
            $fundAccount->credit = 0.00;
            $fundAccount->receipt_id = $receipt->id;
            $fundAccount->description = $request->desc;
            $fundAccount->save();

            //Create StudentAccount
            $studentAccount = new StudentAccount();
            $studentAccount->debit = 0.00;
            $studentAccount->credit = $request->amount;
            $studentAccount->description = $request->desc;
            $studentAccount->student_id = $request->student_id;
            $studentAccount->classroom_id = $request->classroom_id;
            $studentAccount->grade_id = $request->grade_id;
            $studentAccount->receipt_id = $receipt->id;
            $studentAccount->save();


            DB::commit();
            toastr()->success(__('messages.success'));
            return redirect()->route('receipts.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($receipt)
    {
        return view('dashboard.Receipts.edit', compact('receipt'));
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {

            // Update Receipt
            $receipt = Receipt::findOrFail($id);
            $receipt->date = date('y-m-d');
            $receipt->debit = $request->amount;
            $receipt->description = $request->desc;
            $receipt->save();

            // Update FundAccount
            $fundAccount = FundAccount::where('receipt_id', $id)->first();
            $fundAccount->date = date('y-m-d');
            $fundAccount->debit = $request->amount;
            $fundAccount->description = $request->desc;
            $fundAccount->save();

            //Update StudentAccount
            $studentAccount = StudentAccount::where('receipt_id', $id)->first();
            $studentAccount->credit = $request->amount;
            $studentAccount->description = $request->desc;
            $studentAccount->save();

            DB::commit();
            toastr()->success(__('messages.update'));
            return redirect()->route('receipts.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($receipt)
    {

        $receipt->delete();

        toastr()->success(__('messages.delete'));
        return redirect()->route('receipts.index');
    }
}
