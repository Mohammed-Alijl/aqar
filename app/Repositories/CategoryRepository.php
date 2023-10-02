<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Category::get();
    }

    public function getAllForMainPage()
    {
        return Category::where('display_main', 1)->orderBy('display_order')->get();
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }

    public function findBySlug(string $slug)
    {
        return Category::where('slug', $slug)->firstOrFail();
    }

    public function create($request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->display_main = $request->display_main;
        if ($request->display_main == 1)
            $category->display_order = $request->display_order;
        $category->save();
    }

    public function update($request, $id)
    {
        $category = $this->find($id);
        $category->name = $request->name;
        $category->display_main = $request->display_main;
        if ($request->display_main == 1)
            $category->display_order = $request->display_order;
        else
            $category->display_order = null;
        $category->save();
    }

    public function delete($id)
    {
        $category = $this->find($id);
        $category->delete();
    }
}
