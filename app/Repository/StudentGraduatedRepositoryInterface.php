<?php

namespace App\Repository;

interface StudentGraduatedRepositoryInterface
{
    public function index();
    public function create();
    public function softDelete($request);
    public function restore($request);
    public function delete($request);
}
