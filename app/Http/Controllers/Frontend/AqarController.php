<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\AqarRepository;
use Illuminate\Http\Request;

class AqarController extends Controller
{
    public function __construct(private AqarRepository $aqarRepository)
    {
    }

    public function show($slug){
        $aqar = $this->aqarRepository->findBySlug($slug);
        $aqar->watches += 1;
        $aqar->save();
        return view('frontend.aqar', compact('aqar'));
    }
}
