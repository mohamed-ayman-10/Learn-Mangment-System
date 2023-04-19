<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeelsRequest;
use App\Models\Fees;
use App\Repository\FeesRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeesController extends Controller
{

    public $fees;

    public function __construct(FeesRepositoryInterface $fees)
    {
        $this->fees = $fees;
    }

    public function index()
    {
        return $this->fees->index();
    }


    public function create()
    {
        return $this->fees->create();
    }


    public function store(FeelsRequest $request)
    {
        return $this->fees->store($request);
    }

    public function show(Fees $fees)
    {
        //
    }


    public function edit($id)
    {
        return $this->fees->edit($id);
    }


    public function update(FeelsRequest $request, $id)
    {
        return $this->fees->update($request, $id);
    }


    public function destroy($id)
    {
        return $this->fees->destroy($id);
    }
}
