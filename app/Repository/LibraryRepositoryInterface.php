<?php

namespace App\Repository;

interface LibraryRepositoryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($library);
    public function update($request, $library);
    public function destroy($library);
    public function download($library);
}
