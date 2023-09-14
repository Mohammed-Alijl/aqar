<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CateogryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private CategoryRepository $categoryRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CateogryRequest $request)
    {
        $this->categoryRepository->create($request);
        return redirect()->back()->with('add-success',__('success_messages.category.add.success'));
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
    public function update(CateogryRequest $request)
    {
        $this->categoryRepository->update($request,$request->id);
        return redirect()->back()->with('edit-success',__('success_messages.category.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //You Should Edit This To Prevent Delete If The Category Has Any Aqar
        $this->categoryRepository->delete($request->id);
        return redirect()->back()->with('delete-success',__('success_messages.category.delete.success'));
    }
}
