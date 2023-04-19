<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Repository\FeeInvoicesRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeeInvoicesController extends Controller
{

    public $fee;

    public function __construct(FeeInvoicesRepositoryInterface $fee)
    {
        $this->fee = $fee;
    }

    public function get_amount($id, $classroom_id)
    {
        return $this->fee->get_amount($id, $classroom_id);
    }

    public function index()
    {
        return $this->fee->index();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $this->fee->store($request);
    }

    public function show(string $id)
    {
        return $this->fee->show($id);
    }

    public function edit(string $id)
    {
        return $this->fee->edit($id);
    }

    public function update(Request $request, string $id)
    {
        return $this->fee->update($request);
    }

    public function destroy(Request $request, $i)
    {
        // return $request;
        return $this->fee->destroy($request);
    }
}
