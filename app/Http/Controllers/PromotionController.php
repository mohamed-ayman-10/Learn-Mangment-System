<?php

namespace App\Http\Controllers;

use App\Repository\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public $promotion;

    public function __construct(StudentPromotionRepositoryInterface $promotion)
    {
        $this->promotion = $promotion;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->promotion->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->promotion->management();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->promotion->store($request);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->promotion->destroy($request);
    }
}
