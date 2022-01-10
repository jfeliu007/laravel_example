<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\DashboardController::class, 'allTimeHigh'])->name('alltimehigh');
Route::get('/alltimehigh', [App\Http\Controllers\DashboardController::class, 'allTimeHigh'])->name('alltimehigh');
Route::get('/alltimelow', [App\Http\Controllers\DashboardController::class, 'allTimeLow'])->name('alltimelow');
Route::post("/watch/{symbol}", [\App\Http\Controllers\WatchListController::class, "store"]);
Route::get("/watch", [\App\Http\Controllers\WatchListController::class, "show"])->name("watch");