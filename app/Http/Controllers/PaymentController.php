<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Repository\PaymentRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentController extends Controller
{

    public $payment;

    public function __construct(PaymentRepositoryInterface $payment)
    {
        $this->payment = $payment;
    }

    public function index()
    {
        return $this->payment->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->payment->store($request);
    }


    public function show($id)
    {
        return $this->payment->create($id);
    }

    public function edit(Payment $payment)
    {
        return $this->payment->edit($payment);
    }


    public function update(Request $request, Payment $payment)
    {
        return $this->payment->update($request, $payment);
    }


    public function destroy(Payment $payment)
    {
        return $this->payment->destroy($payment);
    }
}
