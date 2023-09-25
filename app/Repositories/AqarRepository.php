<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Aqar;
use App\Models\AqarAttachment;

class AqarRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Aqar::get();
    }

    public function find($id)
    {
        return Aqar::findOrFail($id);
    }

    public function create($request)
    {
        $aqar = new Aqar();
        $aqar->titile = $request->titile;
        if ($request->filled('description'))
            $aqar->description = $request->description;
        $aqar->latitude = $request->latitude;
        $aqar->longitude = $request->longitude;
        $aqar->save();

        foreach ($request->file('attachments') as $attachment) {
            $path = $attachment->store('aqars', 'attachment');
            $attachment = new AqarAttachment();
            $attachment->aqar_id = $aqar->id;
            $attachment->path = $path;
            $attachment->save();
        }

        $aqar->attributes()->attach($request->attributes);
        $aqar->attributeValues()->attach($request->values);
        $aqar->related()->attach($request->related_aqars);
    }

    public function update($request, $id)
    {
        $aqar = $this->find($id);
        $aqar->titile = $request->titile;
        if ($request->filled('description'))
            $aqar->description = $request->description;
        else
            $aqar->description = null;
        $aqar->latitude = $request->latitude;
        $aqar->longitude = $request->longitude;
        $aqar->save();


        if ($request->file('attachments'))
            foreach ($request->file('attachments') as $attachment) {
                $path = $attachment->store('aqars', 'attachment');
                $attachment = new AqarAttachment();
                $attachment->aqar_id = $aqar->id;
                $attachment->path = $path;
                $attachment->save();
            }

        $aqar->attributes()->sync($request->attributes);
        $aqar->attributeValues()->sync($request->values);
        $aqar->related()->sync($request->related_aqars);
    }

    public function delete($id)
    {
        $aqar = $this->find($id);
        $aqar->delete();
    }
}
