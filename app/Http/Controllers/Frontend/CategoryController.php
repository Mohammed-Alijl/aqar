<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private CategoryRepository $categoryRepository)
    {
    }

    public function show(string $id){
        $category = $this->categoryRepository->find($id);
        return view('frontend.category',compact('category'));
    }
}
