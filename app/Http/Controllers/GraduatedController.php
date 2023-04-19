<?php

namespace App\Http\Controllers;

use App\Repository\StudentGraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    public $graduated;

    public function __construct(StudentGraduatedRepositoryInterface $graduated)
    {
        $this->graduated = $graduated;
    }

    public function index()
    {
        return $this->graduated->index();
    }

    public function create()
    {
        return $this->graduated->create();
    }

    public function softDelete(Request $request)
    {
        return $this->graduated->softDelete($request);
    }

    public function restore(Request $request)
    {
        return $this->graduated->restore($request);
    }
    public function delete(Request $request)
    {
        return $this->graduated->delete($request);
    }
}
