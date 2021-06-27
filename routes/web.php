<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
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
