<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aqar;
use App\Repositories\CategoryRepository;
use App\Repositories\ZoneRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private CategoryRepository $categoryRepository,
                                private ZoneRepository     $zoneRepository,
    )
    {
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        $zones = $this->zoneRepository->getAll();
        $minPrice = Aqar::min('price');
        $maxPrice = Aqar::max('price');
        $midPoint = round(($minPrice + $maxPrice) / 2);
        return view('frontend.home', compact('categories', 'zones','minPrice','maxPrice','midPoint'));
    }

    public function suggestions(Request $request)
    {
        $search = $request->input('search');

        $results = Aqar::where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->limit(5)
            ->pluck('id', 'title');

        return json_decode($results);
//        return view('search_suggestions', ['suggestions' => $results]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = [];
        if (!empty($search)) {
            $query = Aqar::query();
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
            $results = $query->get();
        }
        return $results;
    }

    public function filter(Request $request)
    {
        $search = $request->input('search');
        $categories = $request->input('categories');
        $zones = $request->input('zones');
        $prices = $request->input('prices');

        $query = Aqar::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if (!empty($categories)) {
            $query->whereIn('category_id', $categories);
        }

        if (!empty($zones)) {
            $query->whereIn('zone_id', $zones);
        }

        if (!empty($prices)) {
            $query->where(function ($q) use ($prices) {
                foreach ($prices as $priceRange) {
                    $priceRange = explode('-', $priceRange);
                    $minPrice = $priceRange[0];
                    $maxPrice = $priceRange[1];
                    $q->orWhereBetween('price', [$minPrice, $maxPrice]);
                }
            });
        }

        $results = $query->get();
        return $results;

    }

}
