<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Repository\LibraryRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LibraryController extends Controller
{

    public $library;

    public function __construct(LibraryRepositoryInterface $library)
    {
        $this->library = $library;
    }


    public function index()
    {
        return $this->library->index();
    }

    public function create()
    {
        return $this->library->create();
    }

    public function store(Request $request)
    {
        return $this->library->store($request);
    }

    public function show(Library $library)
    {
        return $this->library->download($library);
    }

    public function edit(Library $library)
    {
        return $this->library->edit($library);
    }

    public function update(Request $request, Library $library)
    {
        return $this->library->update($request, $library);
    }

    public function destroy(Library $library)
    {
        return $this->library->destroy($library);
    }
}
