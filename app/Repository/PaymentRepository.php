<?php

namespace App\Repository;

use App\Models\FundAccount;
use App\Models\Payment;
use App\Models\Processing;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;



class PaymentRepository implements PaymentRepositoryInterface
{
    public function index()
    {
        $payments = Payment::all();
        return view('dashboard.Payments.payments', compact('payments'));
    }

    public function create($id)
    {
        $student = Student::findOrFail($id);
        return view('dashboard.Payments.create', compact('student'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {

            // Create Payment
            $payment = new Payment();
            $payment->date = date('y-m-d');
            $payment->amount = $request->amount;
            $payment->description = $request->desc;
            $payment->student_id = $request->student_id;
            $payment->save();

            // Create FundAccount
            $fundAccount = new FundAccount();
            $fundAccount->date = date('y-m-d');
            $fundAccount->credit = $request->amount;
            $fundAccount->description = $request->desc;
            $fundAccount->payment_id = $payment->id;
            $fundAccount->save();

            // Create StudentAccount
            $studentAccount = new StudentAccount();
            $studentAccount->credit = $request->amount;
            $studentAccount->description = $request->desc;
            $studentAccount->student_id = $request->student_id;
            $studentAccount->grade_id = $request->grade_id;
            $studentAccount->classroom_id = $request->classroom_id;
            $studentAccount->payment_id = $payment->id;
            $studentAccount->save();


            DB::commit();
            toastr()->success(__('messages.success'));
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($payment)
    {
        return view('dashboard.Payments.edit', compact('payment'));
    }

    public function update($request, $payment)
    {
        DB::beginTransaction();
        try {

            // Update Payment
            $payment->date = date('y-m-d');
            $payment->amount = $request->amount;
            $payment->description = $request->desc;
            $payment->save();

            // Update FundAccount
            $fundAccount = FundAccount::where('payment_id', $payment->id)->first();
            $fundAccount->date = date('y-m-d');
            $fundAccount->credit = $request->amount;
            $fundAccount->description = $request->desc;
            $fundAccount->save();

            // Update StudentAccount
            $studentAccount =  StudentAccount::where('payment_id', $payment->id)->first();
            $studentAccount->credit = $request->amount;
            $studentAccount->description = $request->desc;
            $studentAccount->save();

            DB::commit();
            toastr()->success(__('messages.update'));
            return redirect()->route('payments.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($payment)
    {

        $payment->delete();

        toastr()->success(__('messages.delete'));
        return redirect()->route('payments.index');
    }
}
