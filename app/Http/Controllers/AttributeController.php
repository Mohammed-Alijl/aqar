<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Repositories\AttributeRepository;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function __construct(private AttributeRepository $attributeRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributes = $this->attributeRepository->getAll();
        return view('admin.attribute.index',compact($attributes));
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
    public function store(AttributeRequest $request)
    {
        $this->attributeRepository->create($request);
        return redirect()->back()->with('add-success',__('success_messages.attribute.add.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attribute = $this->attributeRepository->find($id);
        return view('admin.attribute.show',compact('attribute'));
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
    public function update(AttributeRequest $request)
    {
        $this->attributeRepository->update($request,$request->id);
        return redirect()->back()->with('edit-success',__('success_messages.attribute.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $this->attributeRepository->delete($request->id);
        return redirect()->back()->with('delete-success',__('success_messages.attribute.delete.success'));
    }
}
