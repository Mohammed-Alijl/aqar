<?php

use App\Http\Controllers\Admin\ZoneController;
use App\Http\Controllers\Frontend\AqarController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search/suggestions', [HomeController::class,'suggestions'])->name('search_suggestions');
Route::get('/filter-results', [HomeController::class, 'filter'])->name('filter_results');


// Aqar Page
Route::get('/aqar/{slug}', [AqarController::class, 'show'])->name('aqar');
Route::get('zone-cities/{id}',[ZoneController::class,'getCities']);

// Category Page
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('category.show');

// Privacy Policy
Route::get('privacy-policy',function (){
    return view('frontend.privacy-policy');
})->name('privacy-policy');

// Terms and Conditions
Route::get('terms-conditions',function (){
    return view('frontend.terms-conditions');
})->name('terms-conditions');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    require __DIR__ . '/admin.php';
});
