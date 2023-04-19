<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function get_classroom($id)
    {
        return Classroom::where('grade_id', $id)->pluck('class_name', 'id');
    }

    public function get_section($id)
    {
        return Section::where('classroom_id', $id)->pluck('section_name', 'id');
    }
}
