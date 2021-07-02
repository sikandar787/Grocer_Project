<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ApiController::class,'getProductsApi']);
Route::get('/areas', [ApiController::class,'getAreasApi']);
Route::get('/shops', [ApiController::class,'getShopsApi']);
Route::get('/cities', [ApiController::class,'getCitiesApi']);
Route::get('/units', [ApiController::class,'getUnitsApi']);
Route::get('/categories', [ApiController::class,'getCategoriesApi']);
