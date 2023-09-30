<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\City;

class CityRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return City::get();
    }

    public function find($id)
    {
        return City::findOrFail($id);
    }

    public function create($request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->zone_id = $request->zone_id;
        $city->save();
    }

    public function update($request, $id)
    {
        $city = $this->find($id);
        $city->name = $request->name;
        $city->zone_id = $request->zone_id;
        $city->save();
    }

    public function delete($id)
    {
        $city = $this->find($id);
        $city->delete();
    }
}
