<?php

namespace App\Repository;

interface ReceiptRepositoryInterface
{
    public function index();
    public function create($id);
    public function store($request);
    public function edit($receipt);
    public function update($request, $id);
    public function destroy($receipt);
}
