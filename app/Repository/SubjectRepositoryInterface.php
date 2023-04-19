<?php

namespace App\Repository;

interface SubjectRepositoryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($subject);
    public function update($request, $subject);
    public function destroy($subject);
}
