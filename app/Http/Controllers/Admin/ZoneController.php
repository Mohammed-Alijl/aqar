<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZoneRequest;
use App\Repositories\ZoneRepository;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function __construct(private ZoneRepository $zoneRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zones = $this->zoneRepository->getAll();
        return view('admin.zone.index', compact('zones'));
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
    public function store(ZoneRequest $request)
    {
        $this->zoneRepository->create($request);
        return redirect()->back()->with('add-success', __('success_messages.zone.add.success'));
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
    public function update(Request $request)
    {
        $this->zoneRepository->update($request, $request->id);
        return redirect()->back()->with('edit-success', __('success_messages.zone.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $zone = $this->zoneRepository->find($request->id);
        if ($zone->cities->count() > 0) {
            return redirect()->back()->with('delete-failed', __('failed_messages.zone.can.not.delete'));
        }
        $this->zoneRepository->delete($request->id);
        return redirect()->back()->with('delete-success', __('success_messages.zone.delete.success'));
    }

    public function getCities($id){
        $zone = $this->zoneRepository->find($id);
        return json_decode($zone->cities->pluck('name','id'));
    }
}
