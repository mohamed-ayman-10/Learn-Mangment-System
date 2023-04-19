<?php

namespace App\Http\Controllers;

use App\Models\Processing;
use App\Repository\ProcessingRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProcessingController extends Controller
{

    public $processing;

    public function __construct(ProcessingRepositoryInterface $processing)
    {
        $this->processing = $processing;
    }

    public function index()
    {
        return $this->processing->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->processing->store($request);
    }


    public function show($id)
    {
        return $this->processing->create($id);
    }


    public function edit(Processing $processing)
    {
        return $this->processing->edit($processing);
    }


    public function update(Request $request, Processing $processing)
    {
        return $this->processing->update($request, $processing);
    }


    public function destroy(Processing $processing)
    {
        return $this->processing->destroy($processing);
    }
}
