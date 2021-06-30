<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/add-unit', function () {
    return view('admin.add-unit');
});

Route::get('/add-city', function () {
    return view('admin.add-city');
});

Route::get('/add-category', function () {
    return view('admin.add-category');
});

<<<<<<< HEAD
=======
Route::get('/add-area', function () {
    return view('admin.add-area');
});

Route::get('/add-product', function () {
    return view('admin.add-product');
});

Route::get('/add-product', [ProductController::class, 'getCategories']);

Route::get('/edit-product', [ProductController::class, 'getCategories']);

>>>>>>> b268b7e3fece830552089e247116f95a3047cca8
// unit Setion routes


Route::post('add-unit', [UnitController::class, 'addUnit'])->name('add-unit');
Route::get('view-units', [UnitController::class, 'viewUnits']);
Route::get('delete-unit/{id}', [UnitController::class, 'destroyUnit']);
Route::get('/edit-unit/{id}',[UnitController::class,'editUnit']);
Route::post('update-unit/{id}',[UnitController::class,'updateUnit'])->name('update-unit');


//City Setion Routes
Route::post('add-city', [CityController::class, 'addCity'])->name('add-city');
Route::get('view-cities', [CityController::class, 'viewCities']);
Route::get('delete-city/{id}', [CityController::class, 'destroyCities']);
Route::get('/edit-city/{id}',[CityController::class,'editCity']);
Route::post('update-city/{id}',[CityController::class,'updateCity'])->name('update-city');

// Category routes
Route::post('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
Route::get('/view-categories',[CategoryController::class,'viewCategories']);
Route::get('/delete-category/{id}',[CategoryController::class,'deleteCategory']);
Route::get('/edit-category/{id}',[CategoryController::class,'editCategory']);
Route::post('/update-category/{id}',[CategoryController::class,'updateCategory'])->name('update-category');


//Area Routes
Route::get('/enter-area', [AreaController::class, 'enterArea']);
Route::post('/add-area', [AreaController::class, 'addArea'])->name('add-area');
Route::get('/view-areas',[AreaController::class,'viewAreas']);
Route::get('/delete-area/{id}',[AreaController::class,'deleteArea']);
Route::get('/edit-area/{id}',[AreaController::class,'editArea']);
Route::post('/update-area/{id}',[AreaController::class,'updateArea'])->name('update-area');

// Product routes
Route::post('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
Route::get('/view-products',[ProductController::class,'viewProducts']);
Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct']);
Route::get('/edit-product/{id}',[ProductController::class,'editProduct']);
Route::post('/update-product/{id}',[ProductController::class,'updateProduct'])->name('update-product');
