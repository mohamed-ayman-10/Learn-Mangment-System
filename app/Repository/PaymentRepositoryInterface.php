<?php

namespace App\Repository;

interface PaymentRepositoryInterface
{
    public function index();
    public function create($id);
    public function store($request);
    public function edit($payment);
    public function update($request, $payment);
    public function destroy($payment);
}
