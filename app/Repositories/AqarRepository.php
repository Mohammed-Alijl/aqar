<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Aqar;
use App\Models\AqarAttachment;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Storage;

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

    public function findBySlug($slug)
    {
        return Aqar::where('slug', $slug)->firstOrFail();
    }

    public function create($request)
    {
        $aqar = new Aqar();
        $aqar->title = $request->title;
        if ($request->filled('description'))
            $aqar->description = $request->description;
        $aqar->city_id = $request->city_id;
        $aqar->category_id = $request->category_id;
        $aqar->price = $request->price;
        $aqar->latitude = $request->latitude;
        $aqar->longitude = $request->longitude;
        if ($request->filled('email'))
            $aqar->email = $request->email;
        if ($request->filled('mobile_number'))
            $aqar->mobile_number = $request->mobile_number;
        if ($request->filled('whatsapp_number'))
            $aqar->whatsapp_number = $request->whatsapp_number;
        $aqar->save();

        foreach ($request->file('attachments') as $attachment) {
            $path = $attachment->store('aqars', 'attachment');
            $attachment = new AqarAttachment();
            $attachment->aqar_id = $aqar->id;
            $attachment->path = $path;
            $attachment->save();
        }

        if ($request->filled('attributes')) {
            $attributes = $request->input('attributes');
            $values = $request->input('values');

            foreach ($attributes as $index => $attributeId) {
                $attributeValue = new AttributeValue([
                    'attribute_id' => $attributeId,
                    'name' => $values[$index],
                ]);
                $attributeValue->save();
                $aqar->attributeValues()->attach($attributeValue->id);
            }
            $aqar->attributes()->attach($request->input('attributes'));
        }
        if ($request->filled('related_aqars'))
            $aqar->related()->sync($request->input('related_aqars'));
    }

    public function update($request, $id)
    {
        $aqar = $this->find($id);
        $aqar->title = $request->title;
        if ($request->filled('description'))
            $aqar->description = $request->description;
        else
            $aqar->description = null;
        $aqar->city_id = $request->city_id;
        $aqar->category_id = $request->category_id;
        $aqar->price = $request->price;
        $aqar->latitude = $request->latitude;
        $aqar->longitude = $request->longitude;
        if ($request->filled('email'))
            $aqar->email = $request->email;
        if ($request->filled('mobile_number'))
            $aqar->mobile_number = $request->mobile_number;
        if ($request->filled('whatsapp_number'))
            $aqar->whatsapp_number = $request->whatsapp_number;
        $aqar->save();


        if ($request->file('attachments')) {
            foreach ($aqar->attachments as $attachment) {
                Storage::disk('attachment')->delete($attachment->path);
                $attachment->delete();
            }
            foreach ($request->file('attachments') as $attachment) {
                $path = $attachment->store('aqars', 'attachment');
                $attachment = new AqarAttachment();
                $attachment->aqar_id = $aqar->id;
                $attachment->path = $path;
                $attachment->save();
            }
        }

        if ($request->filled('attributes')) {
            $attributes = $request->input('attributes');
            $values = $request->input('values');
            $valuesId = [];
            $aqar->attributeValues()->delete();

            foreach ($attributes as $index => $attributeId) {
                $attributeValue = new AttributeValue([
                    'attribute_id' => $attributeId,
                    'name' => $values[$index],
                ]);
                $attributeValue->save();
                $valuesId[] = $attributeValue->id;
            }
            $aqar->attributeValues()->sync($valuesId);
            $aqar->attributes()->sync($request->input('attributes'));
        } else {
            $aqar->attributes()->detach();
            $aqar->attributeValues()->detach();
        }


            if ($request->filled('related_aqars'))
                $aqar->related()->sync($request->input('related_aqars'));
            else
                $aqar->related()->detach();
    }

    public function delete($id)
    {
        $aqar = $this->find($id);

        foreach ($aqar->attachments as $attachment) {
            Storage::disk('attachment')->delete($attachment->path);
            $attachment->delete();
        }

        $aqar->attributes()->detach();

        $aqar->attributeValues()->delete();

        $aqar->related()->detach();

        $aqar->delete();
    }
}
