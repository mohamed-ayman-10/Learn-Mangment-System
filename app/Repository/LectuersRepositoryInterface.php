<?php

namespace App\Repository;

interface LectuersRepositoryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($lecture);
    public function update($request, $lecture);
    public function destroy($lecture);
}
