<?php

namespace App\Repository;

interface ProcessingRepositoryInterface
{
    public function index();
    public function create($id);
    public function store($request);
    public function edit($processing);
    public function update($request, $processing);
    public function destroy($processing);
}
