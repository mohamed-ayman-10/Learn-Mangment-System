<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Repository\AttendanceRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttendanceController extends Controller
{

    public $attendance;

    public function __construct(AttendanceRepositoryInterface $attendance)
    {
        $this->attendance = $attendance;
    }

    public function index()
    {
        return $this->attendance->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->attendance->store($request);
    }


    public function show($id)
    {
        return $this->attendance->create($id);
    }


    public function edit(Attendance $attendance)
    {
        return $this->attendance->edit($attendance);
    }


    public function update(Request $request, Attendance $attendance)
    {
        return $this->attendance->update($request, $attendance);
    }

    public function destroy(Attendance $attendance)
    {
        return $this->attendance->destroy($attendance);
    }
}
