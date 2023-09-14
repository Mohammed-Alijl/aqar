<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
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
    });

//    Route::get('/{page}', [AdminController::class,'index']);
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('admin.login');

        Route::post('login', [AuthenticatedSessionController::class, 'store'])
            ->name('admin.login.store');
    });
});
