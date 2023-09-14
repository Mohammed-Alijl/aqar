<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Country;
use App\Models\Zone;

class ZoneRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Zone::get();
    }

    public function find($id)
    {
        return Zone::findOrFail($id);
    }

    public function create($request)
    {
        $zone = new Zone();
        $zone->name = $request->name;
        $zone->country_id = Country::first()->id;
        $zone->save();
    }

    public function update($request, $id)
    {
        $zone = $this->find($id);
        $zone->name = $request->name;
        $zone->save();
    }

    public function delete($id)
    {
        $zone = $this->find($id);
        $zone->delete();
    }
}
