<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductSubCategoryController;

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

Route::get('/',[IndexController::class,'index'])->name('/');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/productCategory',[ProductCategoryController::class,'index'])->name('/productCategory');
    Route::get('/add-category',[ProductCategoryController::class,'create'])->name('/add-category');
    Route::post('/store-category',[ProductCategoryController::class,'store'])->name('/store-category');
    Route::get('/productSubCategory',[ProductSubCategoryController::class,'index'])->name('/productSubCategory');
    Route::get('/add-subcategory',[ProductSubCategoryController::class,'create'])->name('/add-subcategory');
    Route::post('/store-subcategory',[ProductSubCategoryController::class,'store'])->name('/store-subcategory');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
