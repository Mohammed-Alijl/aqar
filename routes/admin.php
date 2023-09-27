<?php

use App\Http\Controllers\Admin\AqarController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ZoneController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttributeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/


Route::prefix('admin')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/',function (){return view('admin.index');})->name('dashboard');

        //Auth Logout
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

        //Category
        Route::resource('categories',CategoryController::class)->except(['show','create','edit']);

        //Zone
        Route::resource('zones',ZoneController::class)->except(['show','create','edit']);

        //Attribute
        Route::resource('attributes',AttributeController::class)->except(['create','edit']);
        Route::get('attribute-values/{attributeId}',[AttributeController::class,'getValues']);

        //Attribute Value
        Route::resource('attribute/values',AttributeValueController::class)->except(['index','show','create','edit']);

        //Attribute Value
        Route::resource('aqars',AqarController::class);

    });

//    Route::get('/{page}', [AdminController::class,'index']);
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('admin.login');

        Route::post('login', [AuthenticatedSessionController::class, 'store'])
            ->name('admin.login.store');
    });
});
