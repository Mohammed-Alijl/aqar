<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\AttributeValue;

class AttributeValueRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return AttributeValue::get();
    }

    public function find($id)
    {
        return AttributeValue::findOrFail($id);
    }

    public function create($request)
    {
        $value = new AttributeValue();
        $value->name = $request->name;
        $value->attribute_id = $request->attribute_id;
        $value->save();
    }

    public function update($request, $id)
    {
        $value = $this->find($id);
        $value->name = $request->name;
        $value->save();
    }

    public function delete($id)
    {
        $value = $this->find($id);
        $value->delete();
    }
}
