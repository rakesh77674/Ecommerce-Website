<?php
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductSubCategoryController;

	

Route::get('/',[IndexController::class,'index'])->name('/');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/product',[ProductController::class,'index'])->name('/product');
    Route::get('/add-product',[ProductController::class,'create'])->name('/add-product');
    Route::post('/store-product',[ProductController::class,'store'])->name('/store-product');
    Route::post('/edit-product/{id}',[ProductController::class,'edit'])->name('edit.index');
    Route::delete('/delete-product/{id}',[ProductController::class,'destroy'])->name('destroy.index');
    Route::put('/update-product/{id}',[ProductController::class,'update'])->name('update.index');
    Route::get('/productCategory',[ProductCategoryController::class,'index'])->name('/productCategory');
    Route::get('/add-category',[ProductCategoryController::class,'create'])->name('/add-category');
    Route::post('/store-category',[ProductCategoryController::class,'store'])->name('/store-category');
    Route::get('/productSubCategory',[ProductSubCategoryController::class,'index'])->name('/productSubCategory');
    Route::get('/add-subcategory',[ProductSubCategoryController::class,'create'])->name('/add-subcategory');
    Route::post('/store-subcategory',[ProductSubCategoryController::class,'store'])->name('/store-subcategory');
    Route::get('/edit-subcategory/{id}',[ProductSubCategoryController::class,'edit'])->name('edit.subcategory');
    Route::put('/update-subcategory/{id}',[ProductSubCategoryController::class,'update'])->name('update.subcategory');
    Route::delete('/delete-subcategory/{id}',[ProductSubCategoryController::class,'destroy'])->name('destroy.subcategory');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
