<?php

use App\Http\Controllers\Frontend\AqarController;
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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    // Home Page
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/search/suggestions', [HomeController::class,'suggestions'])->name('search_suggestions');
    Route::get('/filter-results', [HomeController::class, 'filter'])->name('filter_results');


    // Aqar Page
    Route::get('/aqar/{id}', [AqarController::class, 'show'])->name('aqar');

    require __DIR__ . '/admin.php';

});
