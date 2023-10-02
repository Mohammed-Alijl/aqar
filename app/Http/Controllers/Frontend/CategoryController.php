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

    public function show(string $slug){
        $category = $this->categoryRepository->findBySlug($slug);
        return view('frontend.category', compact('category'));
    }
}
