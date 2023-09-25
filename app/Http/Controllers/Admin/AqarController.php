<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Aqar\StoreRequest;
use App\Http\Requests\Aqar\UpdateRequest;
use App\Repositories\AqarRepository;
use App\Repositories\ZoneRepository;
use Illuminate\Http\Request;

class AqarController extends Controller
{
    public function __construct(private AqarRepository $aqarRepository, private ZoneRepository $zoneRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aqars = $this->aqarRepository->getAll();
        return view('admin.aqar.index',compact('aqars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zones = $this->zoneRepository->getAll();
        return view('admin.aqar.create',compact('zones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $this->aqarRepository->create($request);
        return redirect()->route('aqars.index')->with('add-success',__('success_messages.aqar.add.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aqar = $this->aqarRepository->find($id);
        return view('admin.aqar.show',compact('aqar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aqar = $this->aqarRepository->find($id);
        $zones = $this->zoneRepository->getAll();
        return view('admin.aqar.edit',compact('zones','aqar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $this->aqarRepository->update($request,$id);
        return redirect()->route('aqars.index')->with('edit-success',__('success_messages.aqar.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->aqarRepository->delete($id);
        return redirect()->route('aqars.index')->with('delete-success',__('success_messages.aqar.delete.success'));
    }
}
