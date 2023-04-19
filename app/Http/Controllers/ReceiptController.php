<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Repository\ReceiptRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReceiptController extends Controller
{

    public $receipt;

    public function __construct(ReceiptRepositoryInterface $receipt)
    {
        $this->receipt = $receipt;
    }

    public function index()
    {
        return $this->receipt->index();
    }


    public function create($id)
    {
        return $id;
        return $this->receipt->create($id);
    }


    public function store(Request $request)
    {
        return $this->receipt->store($request);
    }

    public function show($id)
    {
        return $this->receipt->create($id);
    }


    public function edit(Receipt $receipt)
    {
        return $this->receipt->edit($receipt);
    }


    public function update(Request $request, $id)
    {
        return $this->receipt->update($request, $id);
    }


    public function destroy(Receipt $receipt)
    {
        return $this->receipt->destroy($receipt);
    }
}
