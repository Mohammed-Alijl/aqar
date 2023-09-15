<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Attribute;

class AttributeRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Attribute::get();
    }

    public function find($id)
    {
        return Attribute::findOrFail($id);
    }

    public function create($request)
    {
        $attribute = new Attribute();
        $attribute->name = $request->name;
        $attribute->save();
    }

    public function update($request, $id)
    {
        $attribute = $this->find($id);
        $attribute->name = $request->name;
        $attribute->save();
    }

    public function delete($id)
    {
        $attribute = $this->find($id);
        $attribute->delete();
    }

    public function getValues($id){
        $attribute = $this->find($id);
        return $attribute->values;
    }
}
