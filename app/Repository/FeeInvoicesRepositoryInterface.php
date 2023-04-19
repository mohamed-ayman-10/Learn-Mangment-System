<?php

namespace App\Repository;

interface FeeInvoicesRepositoryInterface
{
    public function index();
    public function show($id);
    public function get_amount($id, $classroom_id);
    public function store($request);
    public function edit($id);
    public function update($request);
    public function destroy($request);
}
