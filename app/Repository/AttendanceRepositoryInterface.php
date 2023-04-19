<?php

namespace App\Repository;

interface AttendanceRepositoryInterface
{
    public function index();
    public function create($id);
    public function store($request);
    public function edit($attendance);
    public function update($request, $attendance);
    public function destroy($attendance);
}
