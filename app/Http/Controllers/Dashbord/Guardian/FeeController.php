<?php

namespace App\Http\Controllers\Dashbord\Guardian;

use App\Http\Controllers\Controller;
use App\Models\Fee_invoice;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class FeeController extends Controller
{
    public function index()
    {
        $student_ids = Student::where('guardian_id', Auth::user()->id)->pluck('id');
        $fees = Fee_invoice::whereIn('student_id', $student_ids)->get();
        return view('dashboard.guardians.Dashboard.Fees.index', compact('fees'));
    }

    public function receipt($id)
    {
        $student = Student::with('receipts')->where('guardian_id', Auth::user()->id)->where('id', $id)->first();
        $receipt = $student->receipts;

        if ($receipt->isEmpty()) {
            toastr()->success(__('لا توجد مدفوعات لهذا الطالب'));
            return redirect('guardian/dashboard/fees');
        }
        return view('dashboard.guardians.Dashboard.Fees.receipt', compact('receipt'));
    }
}
